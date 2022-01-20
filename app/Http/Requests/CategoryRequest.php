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
                ? 'required|string|min:5|max:30|unique:categories,name,'.$this->category->id
                : 'required|string|unique:categories|min:5|max:30',

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
