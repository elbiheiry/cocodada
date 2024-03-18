<?php

namespace App\Http\Requests\Admin;

use App\Models\ServiceVideo;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServiceVideoRequest extends FormRequest
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
            'link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'Please enter video link from youtube'
        ];
    }

    public function store($id)
    {
        $video = new ServiceVideo();

        $video->service_id = $id;
        $video->link = $this->link;
        
        $video->save();
    }

    public function edit($id)
    {
        $video = ServiceVideo::find($id);
        
        $video->link = $this->link;
        
        $video->save();
    }
}
