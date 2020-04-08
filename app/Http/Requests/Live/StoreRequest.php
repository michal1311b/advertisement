<?php

namespace App\Http\Requests\Live;

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
            'link' => 'required|min:3',
            'comment' => 'required|min:3',
            'company_name' => 'required|min:3|max:190',
            'status' => 'required',
            'city' => 'required|min:3|max:190',
        ];
    }
}
