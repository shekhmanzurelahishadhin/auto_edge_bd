<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJournalVolumeRequest extends FormRequest
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
            'writer_name' => 'string|required',
            'journal_id' => 'required',
            'volume_id' => 'required',
            'status' => 'required',
            'attachment' => 'required|mimes:jpg,jpeg,png,pdf|max:150000',
        ];
    }
}
