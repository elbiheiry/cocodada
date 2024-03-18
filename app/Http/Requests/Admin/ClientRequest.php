<?php

namespace App\Http\Requests\Admin;

use App\Models\Client;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class ClientRequest extends FormRequest
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
            'image' => $this->route()->getName() == 'admin.clients' ? 'required|max:5120' : 'max:5120'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->route()->getName() == 'admin.clients' ? 'Please upload client image' : '',
            'image.max' => 'Member image size should be less than 5MB'
        ];
    }

    public function store()
    {
        $client = new Client();

        $this->image->store('clients');
        $client->image = $this->image->hashName();
        Image::make(storage_path('uploads/clients/' . $this->image->hashName()))
            ->resize(150, 150)
            ->encode('png', 100)
            ->save(storage_path('uploads/clients/' . $this->image->hashName()));

        $client->save();
    }

    public function edit($id)
    {
        $client = Client::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/clients/').$client->image);
            $this->image->store('clients');
            $client->image = $this->image->hashName();
            Image::make(storage_path('uploads/clients/' . $this->image->hashName()))
                ->resize(150, 150)
                ->encode('png', 100)
                ->save(storage_path('uploads/clients/' . $this->image->hashName()));
        }
        $client->save();
    }
}
