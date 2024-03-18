<?php

namespace App\Http\Requests\Admin;

use App\Models\Team;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => $validator->errors()->all()];

        throw new HttpResponseException(response()->json($result , 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => $this->route()->getName() == 'admin.team' ? 'required|max:5120' : 'max:5120',
            'name_en' => 'required',
            'name_ar' => 'required',
            'position_en' => 'required',
            'position_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->route()->getName() == 'admin.team' ? 'Please upload member image' : '',
            'image.max' => 'Member image size should be less than 5MB',
            'name_en.required' => 'Please enter member name in english',
            'name_ar.required' => 'Please enter member name in arabic',
            'position_en.required' => 'Please enter member position in english',
            'position_ar.required' => 'Please enter member position in arabic',
            'description_en.required' => 'Please enter member description in english',
            'description_ar.required' => 'Please enter member description in arabic',
        ];
    }

    public function store()
    {
        $member = new Team();

        $this->image->store('team');
        $member->image = $this->image->hashName();
        // Image::make(storage_path('uploads/team/' . $this->image->hashName()))
        //     ->resize(460, 540)
        //     ->encode('png', 100)
        //     ->save(storage_path('uploads/team/' . $this->image->hashName()));

        if ($member->save()){
            $member->details()->create([
                'name' => $this->name_en,
                'position' => $this->position_en,
                'description' => $this->description_en,
                'lang' => 'en'
            ]);
            $member->details()->create([
                'name' => $this->name_ar,
                'position' => $this->position_ar,
                'description' => $this->description_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $member = Team::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/team/').$member->image);
            $this->image->store('team');
            $member->image = $this->image->hashName();
            // Image::make(storage_path('uploads/team/' . $this->image->hashName()))
            //     ->resize(460, 540)
            //     ->encode('png', 100)
            //     ->save(storage_path('uploads/team/' . $this->image->hashName()));
        }
        $member->save();

        $member->english()->update([
            'name' => $this->name_en,
            'position' => $this->position_en,
            'description' => $this->description_en
        ]);

        $member->arabic()->update([
            'name' => $this->name_ar,
            'position' => $this->position_ar,
            'description' => $this->description_ar
        ]);
    }
}
