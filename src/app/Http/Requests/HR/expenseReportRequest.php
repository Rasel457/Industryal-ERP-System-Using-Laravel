<?php

namespace App\Http\Requests\HR;

use Illuminate\Foundation\Http\FormRequest;

class expenseReportRequest extends FormRequest
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
            "catagory" => "required|string",
            "amount" => "required|integer",
            "name" => "required|alpha|min:3|max:50",
            "description" => "required|min:10|max:10000",
            "expense_date" => "required|date",
        ];
    }
}
