<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Mendapatkan ID produk yang sedang di-update dari route parameter
        $productId = $this->route('product')->id;

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title'       => ['required', 'string', 'max:255', Rule::unique('products', 'title')->ignore($productId)],
            'price'       => ['required', 'numeric', 'min:1000'],
            'stock'       => ['required', 'integer', 'min:0'],
            'is_active'   => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori wajib dipilih.',
            'title.required'       => 'Nama produk wajib diisi.',
            'title.unique'         => 'Nama produk sudah digunakan oleh produk lain.',
            'price.required'       => 'Harga wajib diisi.',
            'stock.required'       => 'Stok wajib diisi.',
        ];
    }
}