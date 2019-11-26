<?php

namespace App\Http\Requests\Subscriber;

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
            'email' => 'required|min:3|max:190|email|unique:subscribers,email',
            'specializations' => 'required|exists:specializations,id',
            'term1' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'Błąd captcha',
            'g-recaptcha-response.captcha' => 'Błąd captcha',
        ];
    }
}
