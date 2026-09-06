<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    // 1. Menampilkan Semua Daftar Produk (Index)
    public function index()
    {
        // Menggunakan Eager Loading (with) untuk mengambil data relasi category & user
        $products = Product::with(['category', 'user'])
            ->latest()
            ->paginate(6); // Menampilkan 6 item per halaman

        return view('products.index', compact('products'));
    }

    // 2. Menampilkan Detail Satu Produk (Show)
    public function show(Product $product)
    {
        // Menggunakan Route Model Binding (otomatis mencari produk berdasarkan ID)
        $product->load(['category', 'user']);

        return view('products.show', compact('product'));
    }

    // Form Tambah
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Simpan Data
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id() ?? 1; 
        $validated['is_active'] = $request->has('is_active');

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Form Edit
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Update Data
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->has('is_active');

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Hapus Data
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}