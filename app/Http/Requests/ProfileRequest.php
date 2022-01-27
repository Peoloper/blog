<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
                ? 'nullable|string|min:5|max:32|unique:users,name,'.$this->profile->id
                : 'required|string|unique:users|min:5|max:32',
            'email' => request()->isMethod('put')
                ? 'required|email|min:5|max:50|unique:users,email,'.$this->profile->id
                : 'required|email|min:5|max:50|unique:users',
            'password' => request()->isMethod('put')
                ? 'nullable|string|min:8'
                : 'required|string|min:8|max:50',
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
}
