<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ServiceRequest extends FormRequest
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
            'image' => $this->route()->getName() == 'admin.services' ? 'required|max:5120' : 'max:5120',
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'features_en' => 'required',
            'features_ar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->route()->getName() == 'admin.services' ? 'Please upload service image' : '',
            'image.max' => 'Service image should be less than 5 MB',
            'name_en.required' => 'Please enter service name in english',
            'name_ar.required' => 'Please enter service name in arabic',
            'description_en.required' => 'Please enter service description in english',
            'description_ar.required' => 'Please enter service description in arabic',
            'features_en.required' => 'Please enter service features in english',
            'features_ar.required' => 'Please enter service features in arabic',
        ];
    }

    public function store()
    {
        $service = new Service();

        $this->image->store('services');
        $service->image = $this->image->hashName();
        Image::make(storage_path('uploads/services/' . $this->image->hashName()))
            ->resize(64, 64)
            ->encode('png', 100)
            ->save(storage_path('uploads/services/' . $this->image->hashName()));

        $service->slug = Str::slug($this->name_en);

        if ($service->save()){

            $service->update([
                $service->order  => $service->id
            ]);
            $service->details()->create([
                'name' => $this->name_en,
                'description' => $this->description_en,
                'features' => $this->features_en,
                'lang' => 'en'
            ]);

            $service->details()->create([
                'name' => $this->name_ar,
                'description' => $this->description_ar,
                'features' => $this->features_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $service = Service::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/services/').$service->image);
            $this->image->store('services');
            $service->image = $this->image->hashName();
            Image::make(storage_path('uploads/services/' . $this->image->hashName()))
                ->resize(64, 64)
                ->encode('png', 100)
                ->save(storage_path('uploads/services/' . $this->image->hashName()));
        }

        // $service->slug = str_slug($this->name_en);

        $service->save();

        $service->english()->update([
            'name' => $this->name_en,
            'description' => $this->description_en,
            'features' => $this->features_en
        ]);

        $service->arabic()->update([
            'name' => $this->name_ar,
            'description' => $this->description_ar,
            'features' => $this->features_ar
        ]);
    }
}
