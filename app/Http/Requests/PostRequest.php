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
                'max: 1000'
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
}
