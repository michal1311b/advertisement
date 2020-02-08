<?php

namespace App\Http\Requests\CompanyCourse;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCourseRequest extends FormRequest
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
            'name' => 'required|string|max:190',
            'email' => 'required|email|max:190|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'title' => 'required|min:3|max:190|unique:advertisements',
            'description' => 'required|min:3',
            'state_id' => 'required|exists:states,id',
            'location_id' => 'required|exists:locations,id',
            'specialization_id' => 'required|exists:specializations,id',
            'currency_id' => 'required|exists:currencies,id',
            'price' => 'required|numeric',
            'postCode' => 'required|min:3|max:190',
            'street' => 'required|min:3|max:190',
            'company_name' => 'required|min:3|max:190',
            'company_street' => 'required|min:3|max:190',
            'company_post_code' => 'required|min:3|max:190',
            'company_city' => 'required|min:3|max:190',
            'email' => 'required|min:3|max:190',
            'phone' => 'required|min:3|max:190'
        ];
    }
}
