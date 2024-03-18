<?php

namespace App\Http\Requests\Admin;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleRequest extends FormRequest
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
            'start_date' => 'required',
            'name_en' => 'required',
            'name_ar' => 'required',
            'location_en' => 'required',
            'location_ar' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'Please enter video ID from youtube',
            'start_date.required' => 'Please enter event start date',
            'name_en.required' => 'Please enter event name in english',
            'name_ar.required' => 'Please enter event name in arabic',
            'location_en.required' => 'Please enter event location in english',
            'location_ar.required' => 'Please enter event location in arabic'
        ];
    }

    public function store()
    {
        $article = new Article();

        $article->link = $this->link;
        $article->start_date = Carbon::parse($this->start_date);

        if ($article->save()){
            $article->details()->create([
                'name' => $this->name_en,
                'location' => $this->location_en,
                'lang' => 'en'
            ]);
            $article->details()->create([
                'name' => $this->name_ar,
                'location' => $this->location_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $article = Article::find($id);

        $article->link = $this->link;
        $article->start_date = Carbon::parse($this->start_date);

        $article->save();

        $article->english()->update([
            'name' => $this->name_en,
            'location' => $this->location_en
        ]);
        $article->arabic()->update([
            'name' => $this->name_ar,
            'location' => $this->location_ar
        ]);
    }
}
