<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommentRequest extends Request
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
            'content' => 'required|string',
            'my_name' => 'honeypot',
            'my_time' => 'required|honeytime:8',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Veuillez écrire un commentaire...',
            'my_time.honeytime' => 'Attendez avant d\'écrire ! Anti Spam (8 secondes)',
        ];
    }
}
