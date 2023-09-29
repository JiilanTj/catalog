<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tampil Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ __("Daftar Produk") }}</h1>

                
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($products as $product)
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-4">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Nama Produk: {{ $product->name }}</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Id: {{ $product->id }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Kategori: {{ $product->category }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Deksripsi: {{ $product->description }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Harga: {{ $product->price }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Harga Setelah Diskon: {{ $product->price_discount }}</p>
                            </div>
                            <div class="px-4 pb-4">
                                <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                                        Hapus
                                    </button>
                                </form>
                                <br>
                                <!-- Tambahkan tombol Edit untuk setiap produk -->
                                <a href="{{ route('product.edit', $product->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                                    Edit
                                </a>
                            </div>
                            <br>
                        </div>
                        @endforeach
                    </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
