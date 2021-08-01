<?php

namespace App\Http\Requests\Finance;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Common\IsBankConnected;

class BudgetRequest extends FormRequest
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
            'type' => 'required',
            'amount' => ['required',new IsBankConnected()],
        ];
    }
    public function messages()
    {
        return [
            'type.required' => '* Type Required',
            'amount.required' => '* Amount Required',
        ];
    }
}
