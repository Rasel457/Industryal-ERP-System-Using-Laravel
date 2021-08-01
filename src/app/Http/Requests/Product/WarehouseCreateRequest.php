<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseCreateRequest extends FormRequest
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
            "warehouse_id" => "required",
            "warehouse_name" => "required",
            "warehouse_description" => "required|max:10000",
            "warehouse_address" => "required|max:1000",
            "warehouse_zip_code" => "required|numeric",
            "warehouse_city" => "required|max:100",
            "warehouse_country" => "required|max:100",
            "warehouse_phone" => "required|min:11|max:100",
            "warehouse_status" => "required|max:100",
            "warehouse_quantity" => "required|numeric|min:1"
        ];
    }
}
