<?php

namespace App\Http\Requests\Finance;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'name' => 'required',
            'holder_name' => 'required',
            'balance' => 'required',
            'account_no' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '* Name Required',
            'holder_name.required' => '* Account Holder Name Required',
            'balance.required' => '* Balance Required',
            'account_no.required' => '* Account No Required',
        ];
    }
}
