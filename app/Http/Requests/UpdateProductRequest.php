<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Untuk update, kolom yang wajib mengikuti requirement user.
        return [
            'name' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'discount_percentage' => ['nullable', 'integer', 'min:0', 'max:100'],
            'version' => ['nullable', 'string', 'max:255'],
            'file_size' => ['nullable', 'integer'],
            'license' => ['nullable', 'string', 'max:255'],
            'images' => ['nullable', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png', 'max:4096'],
            'thumbnail_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'produk_file' => ['nullable', 'file', 'mimes:zip', 'max:102400'], // 100MB max
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
