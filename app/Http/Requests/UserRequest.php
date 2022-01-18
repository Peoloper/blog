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
        $user = $this->route('user');

        return [
            'name' => request()->isMethod('put') ? 'nullable|string|min:5|max:32' : 'required|string|min:5|max:32',
            'email' => request()->isMethod('put') ? 'nullable|email|min:5|max:50': 'required|email|min:5|max:50'.Rule::unique('users')->ignore($user),
            'password' => request()->isMethod('put') ? 'nullable|string|min:8' : 'required|string|min:8|max:50',
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
