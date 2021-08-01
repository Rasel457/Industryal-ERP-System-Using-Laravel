<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Common\IsEmailTaken ;
use App\Rules\Common\IsUsernameTaken;

class SignupRequest extends FormRequest
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
            'org_name' => 'required',
            'fax' => 'required',
            'established' => 'required',
            'pp' => 'required|mimes:jpg,jpeg,png',
            'email' => ['required','email','max:50',new IsEmailTaken()],
            'firstname' => 'required',
            'lastname' => 'required',
            'pass_confirmation' => 'required',
            'username' => ['required',new IsUsernameTaken()],
            'gender' => 'required',
            'position' => 'required',
            'address' => 'required',
            'phone' => 'required|min:11|max:11',
            'pass' => 'required|string|min:8|max:20|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
        ];
    }
    public function messages(){
        return [
            'email.required' => '* Email Required',
            'email.email' => '* Invalid Email Address',
            'email.max' => '* Must be <= 50 Characters',
            'pass.confirmed' => '* Password Must Match Confirm Password',
            'pass.min' => '* Minimum 8 Characters',
            'pass.max' => '* Must be <= 20 Characters',
            'pass.required' => '* Password Required',
            'pass.regex' => '* At Least One Uppercase, Lowercase, Number, Special Character',
            'pass_confirmation.required' => '* Confirm Password Required',
            'phone.min' => '* Must be 11 Digits',
            'phone.max' => '* Must be 11 Digits',
            'phone.required' => '* Phone Required',
            'username.required' => '* Username Required',
            'firstname.required' => '* Firstname Required',
            'lastname.required' => '* Lastname Required',
            'gender.required' => '* Gender Required',
            'position.required' => '* Position Required',
            'pp.required' => '* Profile Picture Required',
            'pp.mimes' => '* Invalid Image Type',
            'org_name.required' => '* Organization Name Required',
            'fax.required' => '* Organization Fax Required',
            'established.required' => '* Organization EST Required',
        ];
    }
}
