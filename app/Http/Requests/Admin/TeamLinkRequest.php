<?php

namespace App\Http\Requests\Admin;

use App\Models\TeamLink;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TeamLinkRequest extends FormRequest
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
            'icon' => 'required',
            'link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'icon.required' => 'Please enter link icon',
            'link.required' => 'Please enter your profile link'
        ];
    }

    public function store($id)
    {
        $link = new TeamLink();

        $link->team_id = $id;
        $link->icon = $this->icon;
        $link->link = $this->link;

        $link->save();
    }

    public function edit($id)
    {
        $link = TeamLink::find($id);

        $link->icon = $this->icon;
        $link->link = $this->link;

        $link->save();
    }
}
