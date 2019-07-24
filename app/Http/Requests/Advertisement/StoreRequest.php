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
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'work_id' => 'required',
            'state_id' => 'required',
            'city' => 'required|min:3',
            'postCode' => 'required|min:3',
            'street' => 'required|min:3',
            'email' => 'required|min:3',
            'phone' => 'required|min:3',
        ];
    }
}