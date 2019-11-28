<?php

namespace App\Http\Requests\Recipient;

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
            'mailinglist_id' => 'required|exists:mailinglists,id',
            'email' => 'required|email|max:190'
        ];
    }
}
