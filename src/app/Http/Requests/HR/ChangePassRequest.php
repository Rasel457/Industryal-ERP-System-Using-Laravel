<?php

namespace App\Http\Requests\HR;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            "old_password" => "required||min:8|max:15|alpha_num",
            "new_password" => "required||min:8|max:15|alpha_num",
            "confirm_new_password" => "required||min:8|max:15|alpha_num|same:new_password",
        ];
    }
}
