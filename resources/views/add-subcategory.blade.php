<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Sub Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('add-subcategory') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="sub-category-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Sub Category Name
        </label>
        <input type="text" name="name" id="sub-category-name" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
    </div>
    <div class="mb-4">
    <label for="category">Category:</label>
    <select name="category_id" id="category_id" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    </div>
    
    <div class="mb-4">
        <button type="submit" class="bg-white text-gray-800 dark:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded">
            Add Sub Category
        </button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>