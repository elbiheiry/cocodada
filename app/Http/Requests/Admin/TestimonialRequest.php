<?php

namespace App\Http\Requests\Admin;

use App\Models\Testimonial;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class TestimonialRequest extends FormRequest
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
            'image' => $this->route()->getName() == 'admin.testimonials' ? 'required|max:5120' : 'max:5120'
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'Maximum size allowed for image is 5 MB',
            'image.required' => $this->route()->getName() == 'admin.testimonials' ? 'Please upload member image' : ''
        ];
    }

    public function store()
    {
        $member = new Testimonial();
        
        if($this->image){
            $this->image->store('testimonials');
            $member->image = $this->image->hashName();
            Image::make(storage_path('uploads/testimonials/' . $this->image->hashName()))
                ->resize(460, 540)
                ->encode('png', 100)
                ->save(storage_path('uploads/testimonials/' . $this->image->hashName()));
        }
        
        if ($member->save()){
            $member->details()->create([
                'name' => $this->name_en,
                'description' => $this->description_en,
                'lang' => 'en'
            ]);
            $member->details()->create([
                'name' => $this->name_ar,
                'description' => $this->description_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $member = Testimonial::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/testimonials/').$member->image);
            $this->image->store('testimonials');
            $member->image = $this->image->hashName();
            Image::make(storage_path('uploads/testimonials/' . $this->image->hashName()))
                ->resize(460, 540)
                ->encode('png', 100)
                ->save(storage_path('uploads/testimonials/' . $this->image->hashName()));
        }
        $member->save();

        $member->english()->update([
            'name' => $this->name_en,
            'description' => $this->description_en
        ]);

        $member->arabic()->update([
            'name' => $this->name_ar,
            'description' => $this->description_ar,
        ]);
    }
}
