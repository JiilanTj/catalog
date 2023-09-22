<style>
    a {
        margin: 12px;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-900 dark:text-gray-100 mb-4">{{ __("Pilih fitur yang anda inginkan!") }}</p>

                <!-- Buttons for navigation -->
                <div class="flex space-x-4">
                    <a href="{{ route('product.upload') }}" class="bg-white text-gray-800 dark:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded">
                        {{ __('Upload Product') }}
                    </a>
                    
                    <a href="{{ route('tampil-product') }}" class="bg-white text-gray-800 dark:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded">
                        {{ __('Edit Product') }}
                    </a>

                    <a href="{{ route('add-category') }}" class="bg-white text-gray-800 dark:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded mr-4">
                        {{ __('Tambah Kategori') }}
                    </a>

                    <a href="{{ route('delete-category') }}" class="bg-white text-gray-800 dark:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded">
                        {{ __('Hapus Kategori') }}
                    </a>

                    <!-- Add more buttons for other pages as needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
