<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|max:50',
            'pass'=> 'required',
        ];
    }
    public function messages(){
        return [
            'email.required' => '* Email Required',
            'email.email' => '* Invalid Email Address',
            'email.max' => '* Must be < 50 Characters',
            'pass.required' => '* Password Required',
        ];
    }
}
