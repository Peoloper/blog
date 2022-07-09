<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
                ? 'required|string|min:5|max:20|unique:roles,name,'.$this->role->id
                : 'required|string|unique:roles|min:5|max:20',

            'permissions' => [
                'required',
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
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole nazwa jest wymagane',
            'name.min'      => 'Pole nazwa nie może mieć mniej niż :min znaków',
            'name.max'      => 'Pole nazwa nie może przekroczyć :max znaków',
            'name.unique'      => 'Nazwa jest już zajęta',

            'permissions.required'      => 'Wybierz uprawnienia',
        ];
    }
}
