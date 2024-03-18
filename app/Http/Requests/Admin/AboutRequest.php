<?php

namespace App\Http\Requests\Admin;

use App\Models\About;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AboutRequest extends FormRequest
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
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'video' => 'max:20480'
        ];
    }

    public function messages()
    {
        return [
            'title_en.required' => 'Please enter section title in english',
            'title_ar.required' => 'Please enter section title in arabic',
            'description_en.required' => 'Please enter section description in english',
            'description_ar.required' => 'Please enter section description in arabic',
            'video.max' => 'Please notice that maximum size allowed for video is : 20 MB'
        ];
    }

    public function edit($id)
    {
        $about = About::find($id);

        if ($this->video){
            @unlink(storage_path('uploads/about/').$about->video);
            $this->video->store('about');
            $about->video = $this->video->hashName();
        }

        if ($about->save()){
            $about->english()->update([
                'title' => $this->title_en,
                'description' => $this->description_en
            ]);

            $about->arabic()->update([
                'title' => $this->title_ar,
                'description' => $this->description_ar
            ]);
        }
    }
}
