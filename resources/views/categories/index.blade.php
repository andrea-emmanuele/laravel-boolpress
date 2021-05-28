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
                    <a class="rounded-md bg-green-400 py-1 px-3 text-white font-bold" href="/dashboard">Go back</a>
                    <a class="rounded-md bg-green-500 py-1 px-3 text-white font-bold" href="{{ route('addCategory') }}">Add category</a>
                    <div class="w-full flex flex-col mt-6 border-t 2xl:focus:border-gray-200">
                        <h2 class="font-bold text-xl mb-3">Posts published</h2>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <div class="bg-gray-200 py-1 px-3 odd:bg-white hover:bg-gray-300 flex justify-between py-2">
                                    <a href="{{ route('showCategory', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    <div>
                                        <a href="{{ route('editCategory', ['category' => $category->slug]) }}" class="rounded-md bg-blue-500 py-1 px-3 text-white font-bold">Edit</a>
                                        <a class="rounded-md bg-red-500 py-1 px-3 text-white font-bold cursor-pointer"
                                           onclick="event.preventDefault();
                                                this.nextSibling.nextSibling.submit()">
                                            Delete
                                        </a>
                                        <form id="delete" action="{{ route('deleteCategory', ['category' => $category->slug]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No categories exists, let's add one! <a class="rounded-md bg-green-500 py-1 px-3 text-white font-bold w-min whitespace-nowrap" href="{{ route('addCategory') }}">Add category</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
