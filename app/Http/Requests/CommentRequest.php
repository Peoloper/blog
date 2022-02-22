<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min: 3',
                'max: 20',
            ],
            'comment' => [
                'required',
                'string',
                'max:200'
            ],
            'post_id' => [
                'required',
                'integer'
            ]
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth())
            return true;
        else
            return false;
    }
}
