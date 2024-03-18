<?php

namespace App\Http\Requests\Admin;

use App\Models\SocialLink;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SocialLinkRequest extends FormRequest
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
            'icon' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'Please enter your social link',
            'icon.required' => 'Please enter your social link icon'
        ];
    }

    public function store()
    {
        $link = new SocialLink();

        $link->link = $this->link;
        $link->icon = $this->icon;

        $link->save();
    }

    public function edit($id)
    {
        $link = SocialLink::find($id);

        $link->link = $this->link;
        $link->icon = $this->icon;

        $link->save();
    }
}
