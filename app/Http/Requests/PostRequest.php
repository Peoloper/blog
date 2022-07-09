<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => request()->isMethod('put')
                ? 'required|string|min:5|max:50|unique:posts,title,'.$this->post->id
                : 'required|string|unique:posts|min:5|max:50',
            'content' => [
                'required',
                'string',
                'max: 10000'
            ],
            'category_id' => [
                'required',
                'integer'
            ],
            'tags' => [
                'required',
                'array'
            ]
            ,
            'image' => request()->isMethod('put')
                ? 'nullable|mimes:jpeg,jpg,png,gif,svg|max:8000'
                : 'required|mimes:jpeg,jpg,png,gif,svg|max:8000',

            'is_published' => ['boolean']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'title.required' => 'Pole nazwa jest wymagane',
            'title.min'      => 'Pole nazwa nie może mieć mniej niż :min znaków',
            'title.max'      => 'Pole nazwa nie może przekroczyć :max znaków',
            'title.unique'   => 'Nazwa jest już zajęta',

            'content.required' => 'Pole opis jest wymagane',
            'content.max'      => 'Pole opis nie może przekroczyć :max znaków',

            'tags.required'      => 'Wybierz tag',
            'category_id.required'      => 'Wybierz Kategorie',

            'image.nullable'      => 'Zdjęcie nie może być pustę',
            'image.required'      => 'Zdjęcie jest wymagane',
        ];
    }
}
