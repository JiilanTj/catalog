<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('product.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="product-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nama Produk
                            </label>
                            <input type="text" name="product-name" id="product-name" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
                        </div>

                        <div class="mb-4">
                        <label for="product-category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Kategori
                        </label>
                        <select name="product-category" id="product-category" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                        <div class="mb-4">
                            <label for="product-description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Deksripsi produk
                            </label>
                            <textarea name="product-description" id="product-description" rows="4" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="product-price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Harga
                            </label>
                            <input type="number" name="product-price" id="product-price" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
                        </div>

                        <div class="mb-4">
                            <label for="product-price-discount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Harga Setelah Diskon
                            </label>
                            <input type="number" name="product-price-discount" id="product-price-discount" class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
                        </div>

                        <div class="mb-4">
                            <label for="product-images" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Gambar Produk (up to 5)
                            </label>
                            <input type="file" name="product-images[]" id="product-images" accept="image/*" multiple class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-900 dark:text-gray-100">
                        </div>

                        <div id="image-preview" class="mt-2 flex flex-wrap"></div>
                        <div class="mb-4">
                            <button type="submit" class="bg-white text-gray-800 dark:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded">
                                Upload Product
                            </button>
                        </div>
                    </form>
                                        @error('product-name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // Function to display image previews
    function displayImagePreviews() {
        const input = document.getElementById("product-images");
        const preview = document.getElementById("image-preview");
        preview.innerHTML = ""; // Clear previous previews

        // Loop through selected files and create image previews
        for (let i = 0; i < input.files.length; i++) {
            const file = input.files[i];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("w-12", "h-12", "object-cover", "mr-2");
                    preview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        }
    }

    // Add an event listener to the file input to trigger the preview update
    const imageInput = document.getElementById("product-images");
    imageInput.addEventListener("change", displayImagePreviews);
</script>