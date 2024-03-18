<?php

namespace App\Http\Requests\Admin;

use App\Models\Setting;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingRequest extends FormRequest
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
            'address' => 'required',
            'address_ar' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'map' => 'required',
            'email' => 'required',
            'title' => 'required',
            'title_ar' => 'required',
            'description' => 'required',
            'description_ar' => 'required',
            'terms' => 'required',
            'terms_ar' => 'required',
            'payment' => 'required',
            'payment_ar' => 'required',
            'privacy_en' => 'required',
            'privacy_ar' => 'required',
            'author' => 'required',
            'keywords' => 'required',
            'meta_description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Please enter your address in english',
            'address_ar.required' => 'Please enter your address in arabic',
            'phone.required' => 'Please enter phone number for contact',
            'whatsapp.required' => 'Please enter your whatsapp number',
            'email.required' => 'Please enter Email for contact',
            'map.required' => 'Please enter Your location on map',
            'title.required' => 'Please enter footer section title in english',
            'title_ar.required' => 'Please enter footer section title in arabic',
            'description.required' => 'Please enter footer section description in english',
            'description_ar.required' => 'Please enter footer section description in arabic',
            'terms.required' => 'Please enter terms and conditions in english',
            'terms_ar.required' => 'Please enter terms and conditions in arabic',
            'payment.required' => 'Please enter payment terms in english',
            'payment_ar.required' => 'Please enter payment terms in arabic',
            'privacy_en.required' => 'Please enter your privacy policy in english',
            'privacy_ar.required' => 'Please enter your privacy policy in arabic',
            'author.required' => 'Please enter meta author name',
            'keywords.required' => 'Please enter meta keywords',
            'meta_description.required' => 'Please enter meta description'
        ];
    }

    public function edit()
    {
        $settings = Setting::first();

        $settings->address = $this->address;
        $settings->address_ar = $this->address_ar;
        $settings->phone = $this->phone;
        $settings->whatsapp = $this->whatsapp;
        $settings->email = $this->email;
        $settings->map = $this->map;
        $settings->title = $this->title;
        $settings->title_ar = $this->title_ar;
        $settings->description = $this->description;
        $settings->description_ar = $this->description_ar;
        $settings->payment_en = $this->payment;
        $settings->payment_ar = $this->payment_ar;
        $settings->terms_en = $this->terms;
        $settings->terms_ar = $this->terms_ar;
        $settings->privacy_en = $this->privacy_en;
        $settings->privacy_ar = $this->privacy_ar;
        $settings->author = $this->author;
        $settings->keywords = $this->keywords;
        $settings->meta_description = $this->meta_description;

        
        if($this->video){
            @unlink(storage_path('uploads/videos/'.$settings->video));
            $this->video->store('videos');
            $settings->video = $this->video->hashName();
        }
        
        $settings->save();
    }
}
