<?php

namespace App\Http\Requests\SiteContact;

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
            'email' => 'required|min:3|max:190|email',
            'first_name' => 'required|min:3|max:190',
            'message' => 'required|min:3|max:65000',
            'term1'
        ];
    }
}
