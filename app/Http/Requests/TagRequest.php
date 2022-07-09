<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            ? 'required|string|max:10|unique:tags,name,'.$this->tag->id
            : 'required|string|unique:tags|max:10',
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
        ];
    }
}
