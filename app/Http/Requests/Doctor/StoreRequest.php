<?php

namespace App\Http\Requests\Doctor;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'sex' => 'required',
            'pwz' => 'required|numeric',
            'birthday' => 'required',
            'work_id' => 'required|exists:works,id',
            'settlement_id' => 'required|exists:settlements,id',
            'min_salary' => 'required|numeric',
            'currency_id' => 'required|exists:currencies,id',
            'user_location_id' => 'required|exists:locations,id',
            'radius' => 'required'
        ];
    }
}
