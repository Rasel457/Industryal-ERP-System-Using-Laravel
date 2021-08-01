<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
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
            "leave_type" => "required",
            "leave_start_date" => "required|before_or_equal:leave_end_date|after_or_equal:now",
            "leave_end_date" => "required",
            "leave_description" => "required",
        ];
    }
}
