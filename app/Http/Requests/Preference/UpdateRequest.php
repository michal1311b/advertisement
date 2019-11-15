<?php

namespace App\Http\Requests\Preference;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'min_salary' => 'required',
            'currency_id' => 'required|exists:currencies,id',
            'settlement_id' => 'required|exists:settlements,id',
            'work_id' => 'required|exists:works,id',
        ];
    }
}
