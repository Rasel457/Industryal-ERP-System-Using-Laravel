<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class TransferProductRequest extends FormRequest
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
            "product_id" => "required",
            "product_quantity" => "required|min:1|numeric"
        ];
    }
}
