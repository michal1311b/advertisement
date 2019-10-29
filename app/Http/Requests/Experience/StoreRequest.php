<?php

namespace App\Http\Requests\Experience;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'workplace' => 'required|max:190',
            'exp_city' => 'required|max:190',
            'exp_company_name' => 'required|max:190',
            'start_date' => 'required|max:190',
            'end_date' => 'max:190',
            'responsibility' => 'required'
        ];
    }
}
