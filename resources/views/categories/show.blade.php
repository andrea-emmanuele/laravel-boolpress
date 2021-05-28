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
<div class="container mx-auto p-5">
    <h1 class="text-5xl text-white mb-6 font-bold">{{ $category->name }}</h1>

    <div class="flex">
        @foreach($category->post as $post)
            <div class="relative w-80 rounded shadow bg-white mr-5 pt-6 pb-3">
                <h2 class="text-2xl text-center font-bold mb-3">{{ $post->title }}</h2>
                <div class="px-3">
                    <p>{{ $post->content }}</p>
                </div>
                <div class="h-12 flex justify-between items-end">
                    <p class="2xl:text-sm ml-3 font-bold">Author: <span class="font-normal">{{ $post->author }}</span></p>
                    <a href="{{ route('show', ['post' => $post->slug]) }}" class="mr-3 text-white bg-green-600 rounded-md py-1 px-3 hover:bg-green-700">View details</a>
                </div>
            </div>
        @endforeach
    </div>

</div>
</body>
</html>
