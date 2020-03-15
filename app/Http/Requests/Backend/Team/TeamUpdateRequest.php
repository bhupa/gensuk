<?php

namespace App\Http\Requests\Backend\Team;

use Illuminate\Foundation\Http\FormRequest;

class TeamUpdateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name'=>'required|max:50',
            'position'=>'required',
            'image'=>'nullable|mimes:jpeg,png,jpg,svg',
            'facebook'=>'nullable|url',
            'twitter'=>'nullable|url',
            'insta'=>'nullable|url',
        ];
    }
}
