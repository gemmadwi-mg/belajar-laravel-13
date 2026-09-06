@extends('layouts.app')

@section('title', 'Daftar Item')

@section('content')
    <div class="card">
        <h1>Daftar Produk</h1>
        <ul>
            @foreach($items as $item)
                <li style="margin-bottom: 10px;">
                    <strong>{{ $item['nama'] }}</strong> - {{ $item['harga'] }} <br>
                    <a href="{{ route('items.show', $item['id']) }}">Lihat Detail &rarr;</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection