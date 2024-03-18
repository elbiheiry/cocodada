<?php

namespace App\Http\Requests\Admin;

use App\Models\ServiceAudio;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class ServiceAudioRequest extends FormRequest
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
            'audio' => request()->route()->getName() == 'admin.services.audio' ? 'required|max:5120' : 'max:5120',
            'image' => request()->route()->getName() == 'admin.services.audio' ? 'required|max:5120' : 'max:5120',
        ];
    }

    public function messages()
    {
        return [
            'audio.required' => request()->route()->getName() == 'admin.services.audio' ? 'Please select an audio to add here' : '',
            'audio.max' => 'Maximum size allowed for audio id 5 MB',
            'image.required' => request()->route()->getName() == 'admin.services.audio' ? 'Please select an audio image to add here' : '',
            'image.max' => 'Maximum size allowed for image id 5 MB',
        ];
    }

    public function store($id)
    {
        $audio = new ServiceAudio();

        $audio->service_id = $id;

        $this->image->store('services');
        $audio->image = $this->image->hashName();
        Image::make(storage_path('uploads/services/' . $this->image->hashName()))
            ->resize(767, 500)
            ->encode('png', 100)
            ->save(storage_path('uploads/services/' . $this->image->hashName()));

        $this->audio->store('services');
        $audio->audio = $this->audio->hashName();


        $audio->save();
    }

    public function edit($id)
    {
        $audio = ServiceAudio::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/services/').$audio->image);

            $this->image->store('services');
            $audio->image = $this->image->hashName();

            Image::make(storage_path('uploads/services/' . $this->image->hashName()))
                ->resize(767, 500)
                ->encode('png', 100)
                ->save(storage_path('uploads/services/' . $this->image->hashName()));
        }

        if ($this->audio) {
            @unlink(storage_path('uploads/services/').$audio->audio);
            $this->audio->store('services');
            $audio->audio = $this->audio->hashName();
        }
        $audio->save();
    }
}
