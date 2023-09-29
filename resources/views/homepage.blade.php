<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@foreach($products as $product)
    @if($product->category === 'baju')
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg overflow-hidden">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Nama Produk: {{ $product->name }}</h2>
            </div>
            <br>
        </div>
    @endif
@endforeach

@foreach($products as $product)
    @if($product->category === 'celana')
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg overflow-hidden">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Nama Produk: {{ $product->name }}</h2>
            </div>
            <br>
        </div>
    @endif
@endforeach
</body>
</html>