<?php

namespace App\Http\Requests\HR;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
            "firstname" => "required|min:2",
            "lastname" => "required|min:3|max:100|alpha",
            "phone" => "required|min:11",
            "email" => "required|string|email",
            "address" => "required|string|min:3|max:500",
        ];
    }
}
