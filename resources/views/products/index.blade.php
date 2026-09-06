@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h1>Daftar Produk</h1>
        <a href="{{ route('products.create') }}" style="background: #27ae60; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px;">
            + Tambah Produk
        </a>
    </div>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 0.75rem; border-radius: 4px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f2f2f2; text-align: left;">
                <th style="padding: 10px; border-bottom: 2px solid #ddd;">No</th>
                <th style="padding: 10px; border-bottom: 2px solid #ddd;">Nama Produk</th>
                <th style="padding: 10px; border-bottom: 2px solid #ddd;">Kategori</th>
                <th style="padding: 10px; border-bottom: 2px solid #ddd;">Harga</th>
                <th style="padding: 10px; border-bottom: 2px solid #ddd;">Stok</th>
                <th style="padding: 10px; border-bottom: 2px solid #ddd;">Status</th>
                <th style="padding: 10px; border-bottom: 2px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $index => $product)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;">{{ $products->firstItem() + $index }}</td>
                    <td style="padding: 10px;">
                        <strong>{{ $product->title }}</strong><br>
                        <small style="color: #666;">Oleh: {{ $product->user->name ?? 'Anonim' }}</small>
                    </td>
                    <td style="padding: 10px;">
                        <span style="background: #e2e8f0; padding: 3px 8px; border-radius: 12px; font-size: 0.85rem;">
                            {{ $product->category->name ?? 'Tanpa Kategori' }}
                        </span>
                    </td>
                    <td style="padding: 10px;">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td style="padding: 10px;">{{ $product->stock }}</td>
                    <td style="padding: 10px;">
                        @if($product->is_active)
                            <span style="color: green; font-weight: bold;">Aktif</span>
                        @else
                            <span style="color: red; font-weight: bold;">Non-Aktif</span>
                        @endif
                    </td>
                    <td style="padding: 10px;">
                        <a href="{{ route('products.show', $product->id) }}" style="color: #2980b9; margin-right: 5px;">Detail</a>
                        <a href="{{ route('products.edit', $product->id) }}" style="color: #f39c12; margin-right: 5px;">Edit</a>
                        
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: red; cursor: pointer; padding: 0; font: inherit;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 20px;">Belum ada produk tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div style="margin-top: 1rem;">
        {{ $products->links() }}
    </div>
</div>
@endsection