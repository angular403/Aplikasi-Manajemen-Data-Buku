<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Manajemen Buku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <script src="https://unpkg.com/@tailwindcss/browser@4"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> --}}
</head>

<body>
    <div class="container">
        <h1>Manajemen Data Buku</h1>

        @if (Auth::check())
            <p style="margin-bottom: 10px;">Anda Login Sebagai : <strong> {{ Auth::user()->name }}</strong> </p>

            <div style="text-align: right;margin-bottom:10px;">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="tombol">Logout</button>
                </form>
            </div>
        @endif

        <div class="nav">
            <ul>
                <li><a href="/kategori">Kategori</a></li>
                <li><a href="/penerbit">Penerbit</a></li>
                <li><a href="/buku">Buku</a></li>
            </ul>
        </div>
