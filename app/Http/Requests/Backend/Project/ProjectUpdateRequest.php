<?php

namespace App\Http\Requests\Backend\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'title'=>'required|max:50',
            'image'=>'nullable|mimes:jpeg,png,jpg,svg',
            'short_description'=>'required',
            'description'=>'required',
        ];
    }

    public function messages(){
        return[
            'image.dimensions'=>'Please select the image of 19200,*600',
        ];
    }
}
