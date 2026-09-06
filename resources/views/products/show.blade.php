@extends('layouts.app')

@section('title', 'Detail - ' . $product->title)

@section('content')
<div class="card">
    <div style="margin-bottom: 1rem;">
        <a href="{{ route('products.index') }}" style="text-decoration: none; color: #333;">&larr; Kembali ke Daftar Produk</a>
    </div>

    <h1>{{ $product->title }}</h1>
    
    <div style="margin: 1.5rem 0; line-height: 1.8;">
        <p><strong>Kategori:</strong> {{ $product->category->name ?? 'Tanpa Kategori' }}</p>
        <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p><strong>Stok Tersedia:</strong> {{ $product->stock }} unit</p>
        <p><strong>Status:</strong> 
            @if($product->is_active)
                <span style="background: #d4edda; color: #155724; padding: 2px 8px; border-radius: 4px;">Aktif</span>
            @else
                <span style="background: #f8d7da; color: #721c24; padding: 2px 8px; border-radius: 4px;">Non-Aktif</span>
            @endif
        </p>
        <p><strong>Dibuat oleh:</strong> {{ $product->user->name ?? 'Anonim' }}</p>
        <p><strong>Tanggal Ditambahkan:</strong> {{ $product->created_at->format('d F Y, H:i') }} WIB</p>
    </div>

    <hr style="border: 0; border-top: 1px solid #eee; margin: 1.5rem 0;">

    <div>
        <a href="{{ route('products.edit', $product->id) }}" style="background: #f39c12; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px; margin-right: 10px;">
            Edit Produk
        </a>
    </div>
</div>
@endsection