<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class CategoryRequest extends FormRequest
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
            'image' => $this->routeIs('admin.categories') ? 'required|max:5120' : 'max:5120',
            'name_en' => 'required',
            'name_ar' => 'required',
            'services' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->routeIs('admin.categories') ? 'Please upload category image' : null,
            'image.max' => 'Maximum size allowed for image is 5 MB',
            'name_en.required' => 'Please enter category name in english',
            'name_ar.required' => 'Please enter category name in arabic',
            'services.required' => 'Please select related services'
        ];
    }

    public function store()
    {
        $category = new Category();

        $this->image->store('categories');
        $category->image = $this->image->hashName();
        Image::make(storage_path('uploads/categories/' . $this->image->hashName()))
            ->resize(160, 160)
            ->encode('png', 100)
            ->save(storage_path('uploads/categories/' . $this->image->hashName()));

        $category->services = json_encode($this->services);
        if ($category->save()){
            $category->details()->create([
                'name' => $this->name_en,
                'lang' => 'en'
            ]);
            $category->details()->create([
                'name' => $this->name_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if ($this->image){
            @unlink(storage_path('uploads/categories/').$category->image);
            $this->image->store('categories');
            $category->image = $this->image->hashName();
            Image::make(storage_path('uploads/categories/' . $this->image->hashName()))
                ->resize(160, 160)
                ->encode('png', 100)
                ->save(storage_path('uploads/categories/' . $this->image->hashName()));
        }
        $category->services = json_encode($this->services);

        $category->save();

        $category->english()->update([
            'name' => $this->name_en
        ]);
        $category->arabic()->update([
            'name' => $this->name_ar
        ]);
    }
}
