<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'title' => 'required|min:5|max:100',
            // 'slug' => 'required|min:5|max:100',
            // 'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'url_site' => 'nullable',
            // 'url_source_code' => 'nullable',
            // 'description' => 'nullable'
        ];
    }
}
