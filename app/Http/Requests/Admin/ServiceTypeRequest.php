<?php

namespace App\Http\Requests\Admin;

use App\Models\ServiceType;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class ServiceTypeRequest extends FormRequest
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
            'image' => $this->route()->getName() == 'admin.services.types' ? 'required|max:5120' : 'max:5120',
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->route()->getName() == 'admin.services.types' ? 'Please upload an image' : '',
            'image.max' => 'Maximum size allowed for image is 5MB',
            'name_en.required' => 'Please enter category name in english',
            'name_ar.required' => 'Please enter category name in arabic',
            'description_en.required' => 'Please enter category description in english',
            'description_ar.required' => 'Please enter category description in arabic',
        ];
    }

    public function store($id)
    {
        $type = new ServiceType();

        $type->service_id = $id;

        $this->image->store('services');
        $type->image = $this->image->hashName();
        Image::make(storage_path('uploads/services/' . $this->image->hashName()))
            ->resize(595, 842)
            ->encode('png', 100)
            ->save(storage_path('uploads/services/' . $this->image->hashName()));

        if ($type->save()){
            $type->details()->create([
                'name' => $this->name_en,
                'description' => $this->description_en,
                'lang' => 'en'
            ]);

            $type->details()->create([
                'name' => $this->name_ar,
                'description' => $this->description_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $type = ServiceType::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/services/').$type->image);
            $this->image->store('services');
            $type->image = $this->image->hashName();
            Image::make(storage_path('uploads/services/' . $this->image->hashName()))
                ->resize(595, 842)
                ->encode('png', 100)
                ->save(storage_path('uploads/services/' . $this->image->hashName()));
        }

        $type->save();

        $type->english()->update([
            'name' => $this->name_en,
            'description' => $this->description_en
        ]);

        $type->arabic()->update([
            'name' => $this->name_ar,
            'description' => $this->description_ar
        ]);
    }
}
