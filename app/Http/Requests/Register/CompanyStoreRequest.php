<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'title' => 'required|min:3|max:190|unique:advertisements',
            'description' => 'required|min:3',
            'work_id' => 'required|exists:works,id',
            'state_id' => 'required|exists:states,id',
            'location_id' => 'required|exists:locations,id',
            'specialization_id' => 'required|exists:specializations,id',
            'currency_id' => 'required|exists:currencies,id',
            'settlement_id' => 'required|exists:settlements,id',
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric|greater_than_field:min_salary',
            'postCode' => 'required|min:3|max:190',
            'street' => 'required|min:3|max:190',
            'company_name' => 'required|min:3|max:190',
            'company_street' => 'required|min:3|max:190',
            'company_post_code' => 'required|min:3|max:190',
            'company_city' => 'required|min:3|max:190',
            'email' => 'required|min:3|max:190',
            'phone' => 'required|min:3|max:190',
            'galleries.*' => 'image|mimes:jpg,jpeg,png|max:2000'
        ];
    }
}
