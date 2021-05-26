<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boolpress</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-gray-700 to-gray-600">
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-white underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-white underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-white underline">Register</a>
            @endif
        @endauth
    </div>
@endif
<div class="container mx-auto p-5 text-white">
    <h1 class="text-5xl mb-12 font-bold">{{ $post->title }}</h1>
    <p class="mb-10">{{ $post->content }}</p>
    <p>Written by: <span>{{ $post->author }}</span></p>
    <p>Published at: <span>{{ $post->created_at }}</span></p>
</div>
</body>
</html>
