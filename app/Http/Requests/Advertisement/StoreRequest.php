<?php

namespace App\Http\Requests\Advertisement;

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
            'work_id' => 'required',
            'state_id' => 'required',
            'city' => 'required|min:3|max:190',
            'postCode' => 'required|min:3|max:190',
            'street' => 'required|min:3|max:190',
            'email' => 'required|min:3|max:190',
            'phone' => 'required|min:3|max:190',
        ];
    }
}