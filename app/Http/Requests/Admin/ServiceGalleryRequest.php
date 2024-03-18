<?php

namespace App\Http\Requests\Admin;

use App\Models\ServiceGallery;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class ServiceGalleryRequest extends FormRequest
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
            'image' => $this->route()->getName() == 'admin.services.images' ? 'required|max:5120' : 'max:5120'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->route()->getName() == 'admin.services.images' ? 'Please upload an image' : '',
            'image.max' => 'Maximum size allowed for image is 5MB'
        ];
    }

    public function store($id)
    {
        $image = new ServiceGallery();

        $image->service_id = $id;
        $image->featured = $this->featured;

        $this->image->store('services');
        $image->image = $this->image->hashName();
        Image::make(storage_path('uploads/services/' . $this->image->hashName()))
            ->resize(767, 500)
            ->encode('png', 100)
            ->save(storage_path('uploads/services/' . $this->image->hashName()));

        $image->save();
    }

    public function edit($id)
    {
        $image = ServiceGallery::find($id);
        
        $image->featured = $this->featured;
        
        if($this->image){
            @unlink(storage_path('uploads/services/').$image->image);
            $this->image->store('services');
            $image->image = $this->image->hashName();
            Image::make(storage_path('uploads/services/' . $this->image->hashName()))
                ->resize(767, 500)
                ->encode('png', 100)
                ->save(storage_path('uploads/services/' . $this->image->hashName()));
        }
        $image->save();
    }
}
