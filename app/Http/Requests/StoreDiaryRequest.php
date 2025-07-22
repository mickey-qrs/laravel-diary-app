<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiaryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg|max:2048',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
