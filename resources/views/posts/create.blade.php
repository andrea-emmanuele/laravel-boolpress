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
                    <form class="flex flex-col items-center" action="/posts/create" method="post">
                        @csrf
                        <input class="w-96 mb-3" type="text" name="title" placeholder="title">
                        <textarea class="w-96 mb-3" name="content" rows="5" placeholder="Insert content"></textarea>
                        <input class="rounded-md py-1 px-3 bg-green-500 text-white" type="submit" value="Publish now">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
