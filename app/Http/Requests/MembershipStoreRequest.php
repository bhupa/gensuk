<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipStoreRequest extends FormRequest
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
            'name'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'telephone'=>'required',
            'mobile'=>'required',
            'gender'=>'required|not_in:0',
            'fee'=>'required|not_in:0',
            'membership'=>'required|not_in:0',
            'dob'=>'required',
            'message'=>'required',
            'postal_code'=>'required'

        ];
    }
}
