<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'status'      => 'nullable|in:active,inactive,pending',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max'      => 'The title must not exceed 255 characters.',
            'status.in'      => 'Status must be: active, inactive or pending.',
        ];
    }
}
