<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaticQuestionnaire extends FormRequest
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
            'sex' => 'required',
            'age' => 'required',
            'specialization_id' => 'required|exists:specializations,id',
            'specializationp_id' => 'required|exists:specializations,id',
            'worktime' => 'required',
            'description' => 'required|min:3|max:65000',
            'criteria' => 'required|min:3|max:65000',
            'email' => 'required|email|unique:static_questionnaires',
            'g-recaptcha-response' => 'required|captcha',
            'term1' => 'required'
        ];
    }
}
