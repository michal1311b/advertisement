<?php

namespace App\Http\Requests\CompanyCourse;

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
            'title' => 'required|min:3|max:190',
            'description' => 'required|min:3',
            'state_id' => 'required|exists:states,id',
            'location_id' => 'required|exists:locations,id',
            'currency_id' => 'required|exists:currencies,id',
            'specialization_id' => 'required|exists:specializations,id',
            'postCode' => 'required|min:3|max:190',
            'street' => 'required|min:3|max:190',
            'phone' => 'required|min:3|max:190',
            'price' => 'required|min:3|max:190',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }
}
