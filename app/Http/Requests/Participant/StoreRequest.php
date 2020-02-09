<?php

namespace App\Http\Requests\Participant;

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
            'email'=> 'required|email|max:190',
            'first_name' => 'required|max:190',
            'last_name'=> 'required|max:190',
            'street'=> 'required|max:190',
            'city'=> 'required|max:190',
            'post_code'=> 'required|max:190',
            'phone'=> 'required|max:190',
        ];
    }
}
