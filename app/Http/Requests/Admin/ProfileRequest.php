<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->guard('admins')->user()->id,
            'password' => $this->password ? 'min:6' : ''
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'email.required' => 'You must provide an email',
            'email.email' => 'This isn\'t a valid format for email',
            'email.unique' => 'This email is already in use',
            'password.min' => $this->password ? 'Password should be more than 6 digits' : ''
        ];
    }

    public function edit()
    {
        $user = auth()->guard('admins')->user();

        $user->name = $this->name;
        $user->email = $this->email;

        if ($this->password){
            $user->password = bcrypt($this->password);
        }

        $user->save();
    }
}
