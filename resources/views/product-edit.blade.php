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
                        <select name="product-category" id="product-category" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
    @endforeach
</select>
                    </div>
                    <h1>{{$product->sub_category_id}}</h1>
                    <select name="product-sub_category" id="product-sub_category" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
    @foreach ($subcategories as $subcategory)
        <option value="{{ $subcategory->id }}" @if ($product->sub_category_id == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
    @endforeach
</select>
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
