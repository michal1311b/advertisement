<?php

namespace App\Http\Requests\Newsletter;

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
            'title' => 'required|max:190',
            'subject' => 'required|max:190',
            'message' => 'required|max:65000',
            'sending_date' => 'required',
            'time' => 'required'
        ];
    }
}
