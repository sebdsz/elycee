<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RecordRequest extends Request
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
            'title' => 'required|string',
            'content' => 'required|string',
            'number' => 'required|numeric|min:2',
            'class_level' => 'required|string|in:first_class,final_class',
        ];
    }
}
