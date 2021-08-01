<?php

namespace App\Http\Requests\Finance;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
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
            'importfile' => 'required|mimes:json',
        ];
    }
    public function messages()
    {
        return [
            'importfile.required' => '* JSON File Required',
            'importfile.mimes' => '* JSON File Invalid',
        ];
    }
}
