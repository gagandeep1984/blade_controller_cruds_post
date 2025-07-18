<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:500',
            'description' => 'nullable|string|max:2000',
            // 'user_id' => 'nullable|exists:', 
            // 'image' => 'nullable|image|max:2048'
        ];
    }

    // overriding messages methods to provide custom error validation messages 
    // public function messages(): array
    // {
    //     return [
    //         'title.required' => 'The post title is required.',
    //         'content.required' => 'Please provide post content.',
    //     ];
    // }

}
