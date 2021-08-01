<?php

namespace App\Http\Requests\Finance;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\Common\IsBankConnected;

class InvoiceRequest extends FormRequest
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
            'title' => 'required',
            'name' => 'required',
            'order' => ['required', new IsBankConnected()],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => '* Title Required',
            'name.required' => '* Name Required',
            'order.required' => '* Sales Order Required',
        ];
    }
}
