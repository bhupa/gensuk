<?php

namespace App\Http\Requests\Backend\BlogCategories;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoriesStoreRequest extends FormRequest
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
            'name'=>'required||unique:blog_categories,name',
        ];
    }
}
