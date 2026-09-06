@extends('layouts.app')

@section('title', 'Detail - ' . $item['nama'])

@section('content')
    <div class="card">
        <h1>{{ $item['nama'] }}</h1>
        <p><strong>Harga:</strong> {{ $item['harga'] }}</p>
        <p><strong>Deskripsi:</strong> {{ $item['deskripsi'] }}</p>
        <hr>
        <a href="{{ route('items.index') }}">&larr; Kembali ke Daftar Item</a>
    </div>
@endsection