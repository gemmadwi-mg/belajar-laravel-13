<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Laravel')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f9; color: #333; }
        nav { background: #2c3e50; padding: 1rem; }
        nav a { color: #fff; text-decoration: none; margin-right: 15px; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 900px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: #fff; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 1rem; }
        footer { text-align: center; padding: 1rem; background: #ddd; margin-top: 2rem; }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('about') }}">Tentang</a>
        <a href="{{ route('services') }}">Layanan</a>
        <a href="{{ route('items.index') }}">Daftar Item</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} Aplikasi Laravel.
    </footer>

</body>
</html>