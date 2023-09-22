<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ __("Edit Produk") }}</h1>

                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Tambahkan input fields untuk mengedit produk di sini -->
                    <!-- Contoh: -->
                    <div class="mb-4">
                        <label for="product-name" class="block text-gray-700 text-sm font-bold mb-2">Nama Produk:</label>
                        <input type="text" name="product-name" id="product-name" value="{{ $product->name }}" class="border rounded w-full py-2 px-3">
                    </div>
                    <div class="mb-4">
                        <label for="product-category" class="block text-gray-700 text-sm font-bold mb-2">Kategori Produk:</label>
                        <select name="product-category" id="product-category" class="border rounded w-full py-2 px-3">
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}" {{ $product->category == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="product-description" class="block text-gray-700 text-sm font-bold mb-2">Nama description:</label>
                        <input type="text" name="product-description" id="product-description" value="{{ $product->description }}" class="border rounded w-full py-2 px-3">
                    </div>
                    <div class="mb-4">
                        <label for="product-price" class="block text-gray-700 text-sm font-bold mb-2">Harga :</label>
                        <input type="text" name="product-price" id="product-price" value="{{ $product->price }}" class="border rounded w-full py-2 px-3">
                    </div>
                    <div class="mb-4">
                        <label for="product-price_discount" class="block text-gray-700 text-sm font-bold mb-2">Harga Diskon:</label>
                        <input type="text" name="product-price_discount" id="product-price_discount" value="{{ $product->price_discount }}" class="border rounded w-full py-2 px-3">
                    </div>


                    <!-- Tambahkan input fields lainnya sesuai kebutuhan -->

                    <div class="mb-4">
                        <button type="submit" class="bg-white text-gray-800 dark:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded">
                            Update Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
