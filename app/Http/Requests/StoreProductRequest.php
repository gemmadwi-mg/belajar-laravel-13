<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Set true agar diizinkan
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title'       => ['required', 'string', 'max:255', 'unique:products,title'],
            'price'       => ['required', 'numeric', 'min:1000'],
            'stock'       => ['required', 'integer', 'min:0'],
            'is_active'   => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori tidak valid.',
            'title.required'       => 'Nama produk wajib diisi.',
            'title.unique'         => 'Nama produk sudah digunakan.',
            'price.required'       => 'Harga produk wajib diisi.',
            'price.numeric'        => 'Harga harus berupa angka.',
            'price.min'            => 'Harga minimal Rp 1.000.',
            'stock.required'       => 'Stok wajib diisi.',
            'stock.integer'        => 'Stok harus berupa bilangan bulat.',
        ];
    }
}