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
            'title' => [
                'required',
                'string',
                'max: 50',
                //'unique:posts'
            ],
            'content' => [
                'required',
                'string',
                'max: 1000'
            ],
            'category_id' => [
                'required',
                'integer'
            ],
            'tags' => [
                'required',
                'max:8'
            ]
            ,
            'image' => request()->isMethod('put') ? 'nullable|mimes:jpeg,jpg,png,gif,svg|max:8000' : 'required|mimes:jpeg,jpg,png,gif,svg|max:8000',
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
}
