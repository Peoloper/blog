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

    public function messages()
    {
        return [
            'name.required' => 'Pole nazwa jest wymagane',
            'name.min'      => 'Pole nazwa nie może mieć mniej niż :min znaków',
            'name.max'      => 'Pole nazwa nie może przekroczyć :max znaków',

            'comment.required' => 'Komentarz nie może być pusty',
            'comment.min'      => 'Pole nazwa musi mieć minimum :min znaków',
            'comment.max'      => 'Pole nazwa musi mieć maksimum :max znaków',
        ];
    }
}
