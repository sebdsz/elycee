<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QCMRequest extends Request
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
            'status.*' => 'required|numeric|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'status.*' => 'Veuillez répondre à ce choix, merci',
        ];
    }
}
