<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJournalRequest extends FormRequest
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
            'title' => 'string|required',
            'publishing_authority' => 'string|required',
            'editor' => 'string|required',
            'associate_editor' => 'string|required',
            'description' => 'required',
            'published_at' => 'required',
            'status' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:50000',
        ];
    }
}
