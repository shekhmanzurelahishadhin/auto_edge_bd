<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoticeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'notice_type' => 'required',
            'published_at' => 'required',
            'description' => 'required',
            'status' => 'required',
            'attachment_file' => 'nullable|mimes:jpg,jpeg,png,pdf',
        ];
    }
}
