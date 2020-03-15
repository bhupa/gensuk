<?php

namespace App\Http\Requests\Backend\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'image'=>'required|mimes:jpeg,png,jpg,svg',
            'short_description'=>'required',
            'description'=>'required',
            'date'=>'date_format:Y-m-d',
        ];
    }

    public function messages(){
        return[
            'image.dimensions'=>'Please select the image of 19200,*600',
        ];
    }
}
