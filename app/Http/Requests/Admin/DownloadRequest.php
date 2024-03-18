<?php

namespace App\Http\Requests\Admin;

use App\Models\Download;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class DownloadRequest extends FormRequest
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
            'image' => $this->route()->getName() == 'admin.downloads' ? 'required|max:5120' : 'max:5120',
            'name_en' => 'required',
            'name_ar' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->route()->getName() == 'admin.downloads' ? 'Please upload image' : '',
            'image.max' => 'Member image size should be less than 5MB',
            'name_en' => 'Please enter file name in english',
            'name_ar' => 'Please enter file name in arabic'
        ];
    }

    public function store()
    {
        $download = new Download();

        $this->image->store('downloads');
        $download->image = $this->image->hashName();
        Image::make(storage_path('uploads/downloads/' . $this->image->hashName()))
            ->resize(262, 171)
            ->encode('png', 100)
            ->save(storage_path('uploads/downloads/' . $this->image->hashName()));

        $this->file->store('downloads');
        $download->file = $this->file->hashName();

        if ($download->save()){
            $download->details()->create([
                'name' => $this->name_en,
                'lang' => 'en'
            ]);

            $download->details()->create([
                'name' => $this->name_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $download = Download::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/downloads/').$download->image);
            $this->image->store('downloads');
            $download->image = $this->image->hashName();

            Image::make(storage_path('uploads/downloads/' . $this->image->hashName()))
                ->resize(262, 171)
                ->encode('png', 100)
                ->save(storage_path('uploads/downloads/' . $this->image->hashName()));
        }

        if ($this->file){
            @unlink(storage_path('uploads/downloads/').$download->file);
            $this->file->store('downloads');
            $download->file = $this->file->hashName();
        }

        $download->save();

        $download->english()->update([
            'name' => $this->name_en
        ]);

        $download->arabic()->update([
            'name' => $this->name_ar
        ]);
    }
}
