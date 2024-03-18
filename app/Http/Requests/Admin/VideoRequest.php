<?php

namespace App\Http\Requests\Admin;

use App\Models\Video;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VideoRequest extends FormRequest
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
            'link' => 'required',
            'type' => 'not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'Please enter video ID from youtube',
            'type.not_in' => 'Please select video type'
        ];
    }

    public function store()
    {
        $video = new Video();

        $video->link = $this->link;
        $video->type = $this->type;

        $video->save();
    }

    public function edit($id)
    {
        $video = Video::find($id);

        $video->link = $this->link;
        $video->type = $this->type;

        $video->save();
    }
}
