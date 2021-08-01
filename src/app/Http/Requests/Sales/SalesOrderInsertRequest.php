<?php

namespace App\Http\Requests\Sales;
use Illuminate\Foundation\Http\FormRequest;

class SalesOrderInsertRequest extends FormRequest
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
            "cus_id" => "required",
            "order_des" => "required",
        ];
    }

    public function messages()
    {
        return [
            "order_des.required" => "Please enter a description",
        ];
    }
}
