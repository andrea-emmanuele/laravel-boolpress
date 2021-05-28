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
                    @if ($errors->any())
                        <div class="text-center mb-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-800 font-bold">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="flex flex-col items-center" action="{{ route('storeCategory') }}" method="post">
                        @csrf
                        <input class="w-96 mb-3" type="text" name="name" value="{{ old('name') }}" placeholder="Write category name">
                        <div class="w-96 flex justify-evenly">
                            <input class="cursor-pointer rounded-md py-1 px-3 bg-green-500 text-white" type="submit" value="Add Category">
                            <a href="{{ route('allCategories') }}" class="cursor-pointer rounded-md py-1 px-3 text-green-500 bg-transparent border-2 border-green-500 text-white">Go back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
