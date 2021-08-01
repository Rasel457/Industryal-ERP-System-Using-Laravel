<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class SalesCustomerUpdateRequest extends FormRequest
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
            "cus_name" => "required",
            "cus_name" => "regex:/^[a-zA-Z ]*$/",
            "cus_email" => "required",
            "cus_phone" => "required",
            "cus_del" => "required|max:10000",
        ];
    }

    public function messages()
    {
        return [
            "cus_name.required" => "Please enter a name",
            "cus_name.regex" => "Please enter only alphabets",
            "cus_email.required" => "Please enter an email",
            "cus_phone.required" => "Please enter a phone number",
            "cus_del.required" => "Please enter a delivery point",
        ];
    }
}
