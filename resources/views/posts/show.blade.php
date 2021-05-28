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
<body class="bg-gray-100">
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm underline">Register</a>
            @endif
        @endauth
    </div>
@endif
<div class="container mx-auto p-5">
    <img class="w-1/3 h-80 object-cover object-center rounded-lg mb-3" src="{{asset('storage/' . $post->thumb)}}">
    <h1 class="text-5xl mb-2 font-bold">{{ $post->title }}</h1>
    <span>Category: </span><a class="inline-block text-blue-800 mb-8" href="{{ route('showCategory', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
    <p class="text-gray-400 mb-10">{{ $post->content }}</p>
    <p>Written by: <span>{{ $post->author }}</span></p>
    <p>Published at: <span>{{ $post->created_at }}</span></p>
</div>
</body>
</html>
