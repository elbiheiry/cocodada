<?php

namespace App\Http\Requests\Admin;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class BlogRequest extends FormRequest
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
            'outer_image' => $this->route()->getName() == 'admin.blog' ? ['required','image','max:5120'] : ['image','max:2048'],
            'inner_image' => $this->route()->getName() == 'admin.blog' ? ['required','image','max:5120'] : ['image','max:2048'],
            'title_en' => ['required','string','max:225'],
            'title_ar' => ['required','string','max:225'],
            'description_en' => ['required'],
            'description_ar' => ['required'],
            'meta_title_en' => 'required',
            'meta_title_ar' => 'required',
            'meta_keywords_en' => 'required',
            'meta_keywords_ar' => 'required',
            'meta_description_en' => 'required',
            'meta_description_ar' => 'required',
        ];
    }
    
    public function attributes()
    {
        return [
            'outer_image' => 'Article outer image',
            'inner_image' => 'Article inner image',
            'title_en' => 'Article title in english',
            'title_ar' => 'Article title in arabic',
            'description_en' => 'Article description in english',
            'description_ar' => 'Article description in arabic',
            'meta_title_en' => 'Meta title in english',
            'meta_title_ar' => 'Meta title in arabic',
            'meta_keywords_en' => 'Meta keywords in english',
            'meta_keywords_ar' => 'Meta keywords in arabic',
            'meta_description_en' => 'Meta description in english',
            'meta_description_ar' => 'Meta description in arabic',
            
        ];
    }

    public function store()
    {
        $article = new Blog();
        
        $this->outer_image->store('blog');
        $article->outer_image = $this->outer_image->hashName();
        Image::make(storage_path('uploads/blog/' . $this->outer_image->hashName()))
            ->resize(767, 500)
            ->encode('png', 100)
            ->save(storage_path('uploads/blog/' . $this->outer_image->hashName()));
            
        $this->inner_image->store('blog');
        $article->inner_image = $this->inner_image->hashName();
        Image::make(storage_path('uploads/blog/' . $this->inner_image->hashName()))
            ->resize(1120, 730)
            ->encode('png', 100)
            ->save(storage_path('uploads/blog/' . $this->inner_image->hashName()));
            
        $article->slug = Str::slug($this->title_en);

        if ($article->save()){
            $article->details()->create([
                'title' => $this->title_en,
                'description' => $this->description_en,
                'lang' => 'en',
                
                //SD Dev1 custom code
                'meta_title' => $this->meta_title_en,
                'meta_description' => $this->meta_description_en,
                'meta_keywords' => $this->meta_keywords_en,
            ]);
            $article->details()->create([
                'title' => $this->title_ar,
                'description' => $this->description_ar,
                'lang' => 'ar',
                
                //SD Dev1 custom code
                'meta_title' => $this->meta_title_ar,
                'meta_description' => $this->meta_description_ar,
                'meta_keywords' => $this->meta_keywords_ar,
            ]);
        }
    }

    public function edit($id)
    {
        $article = Blog::find($id);

        if ($this->outer_image) {
            @unlink(storage_path('uploads/articles/') . $article->outer_image);
            $this->outer_image->store('blog');
            $article->outer_image = $this->outer_image->hashName();
            Image::make(storage_path('uploads/blog/' . $this->outer_image->hashName()))
                ->resize(767, 500)
                ->encode('png', 100)
                ->save(storage_path('uploads/blog/' . $this->outer_image->hashName()));
        }
        
        if ($this->inner_image) {
            @unlink(storage_path('uploads/articles/') . $article->inner_image);
            $this->inner_image->store('blog');
            $article->inner_image = $this->inner_image->hashName();
            Image::make(storage_path('uploads/blog/' . $this->inner_image->hashName()))
                ->resize(1120, 730)
                ->encode('png', 100)
                ->save(storage_path('uploads/blog/' . $this->inner_image->hashName()));
        }
        
        if($article->slug != Str::slug($this->title_en)){
            $article->slug = Str::slug($this->title_en);
        }

        $article->save();

        $article->english()->update([
            'title' => $this->title_en,
            'description' => $this->description_en,
            
            //SD Dev1 custom code
            'meta_title' => $this->meta_title_en,
            'meta_description' => $this->meta_description_en,
            'meta_keywords' => $this->meta_keywords_en,
        ]);
        $article->arabic()->update([
            'title' => $this->title_ar,
            'description' => $this->description_ar,
            
            //SD Dev1 custom code
            'meta_title' => $this->meta_title_ar,
            'meta_description' => $this->meta_description_ar,
            'meta_keywords' => $this->meta_keywords_ar,
        ]);
    }
}
