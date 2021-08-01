<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Common\IsEmailValid ;

class ForgotpassEmailRequest extends FormRequest
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
            'email' => ['required','email','max:50',new IsEmailValid()],
        ];
    }
    public function messages(){
        return [
            'email.required' => '* Email Required',
            'email.email' => '* Invalid Email Address',
        ];
    }
}
