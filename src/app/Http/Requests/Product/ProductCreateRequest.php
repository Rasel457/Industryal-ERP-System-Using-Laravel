<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            "product_name" => "required|string",
            "product_sell_status" => "required",
            "product_purchase_status" => "required",
            "product_description" => "required|max:10000",
            "warehouse_name" => "required",
            "product_stock" => "required|numeric|min:1",
            "product_nature" => "required",
            "product_weight" => "required|numeric|min:1",
            "product_weight_unit" => "required",
            "product_dimention" => "required",
            "product_dimention_unit" => "required",
            "product_selling_price" => "required",
            "product_selling_tax" => "required",
        ];
    }
}
