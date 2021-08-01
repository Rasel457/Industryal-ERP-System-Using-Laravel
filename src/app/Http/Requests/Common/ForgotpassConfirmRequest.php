<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Common\IsOtpValid;

class ForgotpassConfirmRequest extends FormRequest
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
            'pass' => 'required|string|min:8|max:20|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'pass_confirmation' => 'required',
            'otp' => ['required','min:6','max:6', new IsOtpValid()],
        ];
    }
    public function messages(){
        return [
            'pass.confirmed' => '* Password Must Match Confirm Password',
            'pass.min' => '* Minimum 8 Characters',
            'pass.max' => '* Must be <= 20 Characters',
            'pass.required' => '* Password Required',
            'pass.regex' => '* At Least One Uppercase, Lowercase, Number, Special Character',
            'pass_confirmation.required' => '* Confirm Password Required',
            'otp.min' => '* Otp Must 6 Characters',
            'otp.max' => '* Otp Must 6 Characters',
            'otp.required' => '* Otp Required',
        ];
    }
}
