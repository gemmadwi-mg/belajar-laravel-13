@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="card">
    <h1>Edit Produk: {{ $product->title }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf ⚠️ Wajib untuk keamanan POST
        @method('PUT') <!-- Mengubah method POST menjadi PUT -->

        <!-- Relasi Tabel Categories -->
        <div style="margin-bottom: 1rem;">
            <label for="category_id">Kategori:</label><br>
            <select name="category_id" id="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Produk -->
        <div style="margin-bottom: 1rem;">
            <label for="title">Nama Produk:</label><br>
            <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}">
            @error('title')
                <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Harga -->
        <div style="margin-bottom: 1rem;">
            <label for="price">Harga (Rp):</label><br>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}">
            @error('price')
                <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Stok -->
        <div style="margin-bottom: 1rem;">
            <label for="stock">Stok:</label><br>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}">
            @error('stock')
                <div style="color: red; font-size: 0.85rem;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status Aktif -->
        <div style="margin-bottom: 1rem;">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                Aktifkan Produk
            </label>
        </div>

        <button type="submit">Update Produk</button>
        <a href="{{ route('items.index') }}">Batal</a>
    </form>
</div>
@endsection