<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="rounded-md bg-green-500 py-1 px-3 text-white font-bold" href="/posts/create">Write new post</a>
                    <div class="w-full flex flex-col mt-6 border-t 2xl:focus:border-gray-200">
                        <h2 class="font-bold text-xl mb-3">Posts published</h2>
                        @foreach($posts as $post)
                            <div class="bg-gray-200 py-1 px-3 odd:bg-white hover:bg-gray-300 flex justify-between py-2">
                                <a href="/post/{{ $post->id }}">{{ $post->title }}</a>
                                <div>
                                    <a href="/post/{{ $post->id }}/edit" class="rounded-md bg-blue-500 py-1 px-3 text-white font-bold">Edit</a>
                                    <a href="/post/{{ $post->id }}/delete" class="rounded-md bg-red-500 py-1 px-3 text-white font-bold">Delete</a>
                                </div>
                            </div>
                        @endforeach
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
