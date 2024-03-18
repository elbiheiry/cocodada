<?php

namespace App\Http\Requests\Admin;

use App\Models\Package;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PackageRequest extends FormRequest
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
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'terms_en' => 'required',
            'terms_ar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'Please enter package name in english',
            'name_ar.required' => 'Please enter package name in arabic',
            'description_en.required' => 'Please enter package description in english',
            'description_ar.required' => 'Please enter package description in arabic',
            'terms_en.required' => 'Please enter package terms in english',
            'terms_ar.required' => 'Please enter package terms in arabic',
        ];
    }

    public function store()
    {
        $package = new Package();

        if ($package->save()){
            $package->details()->create([
                'name' => $this->name_en,
                'description' => $this->description_en,
                'terms' => $this->terms_en,
                'lang' => 'en'
            ]);
            $package->details()->create([
                'name' => $this->name_ar,
                'description' => $this->description_ar,
                'terms' => $this->terms_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $package = Package::find($id);

        $package->english()->update([
            'name' => $this->name_en,
            'description' => $this->description_en,
            'terms' => $this->terms_en
        ]);

        $package->arabic()->update([
            'name' => $this->name_ar,
            'description' => $this->description_ar,
            'terms' => $this->terms_ar
        ]);
    }
}
