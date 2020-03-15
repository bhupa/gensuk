<?php

namespace App\Http\Requests\Backend\LifeMember;

use Illuminate\Foundation\Http\FormRequest;

class LifeMemberStoreRequest extends FormRequest
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
            'team_id'=>'required|exists:team,id',
        ];
    }
}
