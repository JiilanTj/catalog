<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hapus Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-700">

<form action="{{ route('delete-category') }}" method="post">
    @csrf
    <div class="p-6 text-gray-900 dark:text-gray-200"><label for="category">Pilih Kategori untuk dihapus </label></div>
    <select name="category_id" id="category">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br><br>
    <button type="submit" class="bg-white text-gray-800 dark:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded">Delete</button>
</form>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
