<?php

namespace App\Http\Requests\Finance;

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
            'request_description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'request_description.required' => '* Description Required',
            'start_time.required' => '* Start Time Required',
            'end_time.required' => '* End Time Required',
        ];
    }
}
