<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'download_path' => ['required', 'string', 'max:2048'],

            'discount_percentage' => ['nullable', 'integer', 'min:0', 'max:100'],

            'thumbnail_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'thumbnail_image.mimes' => 'Thumbnail harus berupa file gambar dengan format: jpg, jpeg, png.',
            'thumbnail_image.max' => 'Thumbnail maksimal berukuran 2MB.',
        ];
    }
}

