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
            <h1 class="text-5xl mb-12 font-bold">Posts</h1>
            <div class="flex flex-col lg:flex-row">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                    <div class="relative w-80 rounded shadow bg-white mr-5 pb-3 overflow-hidden">
                        <img class="w-full h-44 object-cover mb-4" src="{{asset('storage/' . $post->thumb)}}">
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
                @else
                    <p class="text-gray-400 text-xl">No posts founded!</p>
                @endif
            </div>
        </div>
    </body>
</html>
