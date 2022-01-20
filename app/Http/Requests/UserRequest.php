<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
                ? 'nullable|string|min:5|max:32|unique:users,name,'.$this->user->id
                : 'required|string|unique:users|min:5|max:32',
            'email' => request()->isMethod('put')
                ? 'required|email|min:5|max:50|unique:users,email,'.$this->user->id
                : 'required|email|min:5|max:50|unique:users',
            'password' => request()->isMethod('put')
                ? 'nullable|string|min:8'
                : 'required|string|min:8|max:50',

            'role' =>[
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
        return true;
    }
}
