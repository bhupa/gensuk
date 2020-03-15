<?php

namespace App\Http\Requests\Backend\ContentBanner;

use Illuminate\Foundation\Http\FormRequest;

class ContentBannerUpdateRequest extends FormRequest
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
            'short_description'=>'required'
        ];
    }

    public function messages(){
        return[
            'image.dimensions'=>'Please select the image of 1920*600',
        ];
    }
}
