<?php
namespace App\Http\Requests\Admin;

use App\Models\Project;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProjectRequest extends FormRequest
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
        $result = ['status' => 'error', 'data' => $validator->errors()->all()];

        throw new HttpResponseException(response()->json($result, 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             //'image' => \Request::route()->getName() == 'admin.projects' ? 'required|max:5120' : 'max:1024',
            // 'code' => 'required',
            // 'price' => 'required',

            'name_en' => 'required',
            'name_ar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //'image.required' => \Request::route()->getName() == 'admin.projects' ? 'Please upload product image' : '',
            //'image.max' => 'Member image size should be less than 1MB',
            // 'code.required' => 'Please enter product code',
            // 'price.required' => 'Please enter product price',

            'name_en.required' => 'Please enter product name in english',
            'name_ar.required' => 'Please enter product name in arabic'
        ];
    }

    public function store($id)
    {
        $project = new Project();

        $project->category_id = $id;
        $project->code = $this->code;
        $project->price = $this->price;
        $project->slug = Str::slug($this->name_en);

        if($this->image){
            $this->image->store('projects');
            $project->image = $this->image->hashName();
            Image::make(storage_path('uploads/projects/' . $this->image->hashName()))
                ->resize(315, 210)
                ->encode('png', 100)
                ->save(storage_path('uploads/projects/' . $this->image->hashName()));
        }
        if ($project->save()) {
            $project->details()->create([
                'name' => $this->name_en,
                'description' => $this->description_en,
                'activities' => $this->activities_en,
                'scenario' => $this->scenario_en,
                'size' => $this->size_en,
                'featuring' => $this->featuring_en,
                'lang' => 'en',
            ]);

            $project->details()->create([
                'name' => $this->name_ar,
                'description' => $this->description_ar,
                'activities' => $this->activities_ar,
                'scenario' => $this->scenario_ar,
                'size' => $this->size_ar,
                'featuring' => $this->featuring_ar,
                'lang' => 'ar',
            ]);
        }
    }

    public function edit($id)
    {
        $project = Project::find($id);

        $project->code = $this->code;
        $project->price = $this->price;
        $project->slug = Str::slug($this->name_en);

        if ($this->image) {
            @unlink(storage_path('uploads/projects/') . $project->image);
            $this->image->store('projects');
            $project->image = $this->image->hashName();
            Image::make(storage_path('uploads/projects/' . $this->image->hashName()))
                ->resize(315, 210)
                ->encode('png', 100)
                ->save(storage_path('uploads/projects/' . $this->image->hashName()));
        }
        $project->save();

        $project->english()->update([
            'name' => $this->name_en,
            'description' => $this->description_en,
            'activities' => $this->activities_en,
            'scenario' => $this->scenario_en,
            'size' => $this->size_en,
            'featuring' => $this->featuring_en
        ]);

        $project->arabic()->update([
            'name' => $this->name_ar,
            'description' => $this->description_ar,
            'activities' => $this->activities_ar,
            'scenario' => $this->scenario_ar,
            'size' => $this->size_ar,
            'featuring' => $this->featuring_ar
        ]);
    }
}
