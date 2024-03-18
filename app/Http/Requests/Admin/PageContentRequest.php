<?php

namespace App\Http\Requests\Admin;

use App\Models\PageContent;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PageContentRequest extends FormRequest
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
            'description_en' => 'required',
            'description_ar' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'description_en.required' => 'Please enter section description in english',
            'description_ar.required' => 'Please enter section description in arabic'
        ];
    }

    public function edit($id)
    {
        $page = PageContent::find($id);

        if ($page->brochure){
            @unlink(storage_path('uploads/pages/').$page->brochure);

            $this->brochure->store('pages');
            $page->brochure = $this->brochure->hashName();
        }

        if ($page->save()){
            $page->english()->update([
                'description' => $this->description_en
            ]);
            $page->arabic()->update([
                'description' => $this->description_ar
            ]);
        }
    }
}
