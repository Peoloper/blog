<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => request()->isMethod('put')
                ? 'required|string|min:2|max:30|unique:categories,name,'.$this->category->id
                : 'required|string|unique:categories|min:2|max:30',

            'image' => request()->isMethod('put')
                ? 'nullable|mimes:jpeg,jpg,png,gif,svg|max:8000'
                : 'required|mimes:jpeg,jpg,png,gif,svg|max:8000'
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
            'name.required' => 'Pole nazwa jest wymagane',
            'name.min'      => 'Pole nazwa nie może mieć mniej niż :min znaków',
            'name.max'      => 'Pole nazwa nie może przekroczyć :max znaków',
            'name.unique'      => 'Nazwa jest już zajęta',

            'image.nullable'      => 'Zdjęcie nie może być pustę',
            'image.required'      => 'Zdjęcie jest wymagane',
        ];
    }
}
