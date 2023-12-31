<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('add-category') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="category-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Category Name
        </label>
        <input type="text" name="name" id="category-name" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
    </div>
    <div class="mb-4">
        <button type="submit" class="bg-white text-gray-800 dark:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded">
            Add Category
        </button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>