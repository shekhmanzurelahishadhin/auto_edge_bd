<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'brand_id' => 'required',
            'model_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:50000',
        ];
    }
}
