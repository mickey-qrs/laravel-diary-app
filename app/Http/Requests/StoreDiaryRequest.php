<?php

namespace App\Http\Requests;

use App\Models\Diary;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreDiaryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'body' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg|max:2048',
        ];
    }

    /** @return array<string,string> */
    public function attributes(): array
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
            'image' => '画像',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $today = Carbon::today();
            $exists = Diary::whereDate('created_at', $today)->exists();

            if ($exists) {
                $validator->errors()->add('created_at', '本日はすでに日記を投稿しています。');
            }
        });
    }

    public function authorize(): bool
    {
        return true;
    }
}
