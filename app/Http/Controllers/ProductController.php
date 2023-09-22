<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function showUploadForm()
    {
        $categories = Category::all();
        return view('product-upload', ['categories' => $categories]);
    }

   

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product-name' => 'required|string|max:255',
            'product-category' => 'required|string|max:255',
            'product-description' => 'required|string',
            'product-price' => 'required|numeric',
            'product-price-discount' => 'nullable|numeric',
            'product-images.*' => 'image|max:2048', // Max file size: 2MB
        ]);

        // Process the uploaded files and store them
        $imagePaths = [];
        if ($request->hasFile('product-images')) {
            foreach ($request->file('product-images') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $imagePaths[] = 'uploads/' . $imageName;
            }
        }

        $product = new Product([
            'name' => $validatedData['product-name'],
            'category' => $validatedData['product-category'],
            'description' => $validatedData['product-description'],
            'price' => $validatedData['product-price'],
            'price_discount' => $validatedData['product-price-discount'],
            'images' => json_encode($imagePaths), // Store image paths in JSON format
        ]);
        $product->save();

        // Redirect to a success page or return a success response
        return redirect()->route('product.upload')->with('success', 'Product uploaded successfully!');
    }

    public function showProducts()
    {
        // Retrieve products from the database
        $products = Product::all(); // You can modify this to retrieve products as needed

        // Pass the products data to the view
        return view('tampil-product', compact('products'));
    }

    public function destroy($id)
    {
        // Find and delete the product by its ID
        Product::destroy($id);

        // Redirect back to the product listing page
        return redirect()->route('dashboard')->with('success', 'Product deleted successfully');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('product-edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validasi data yang diubah
        $validatedData = $request->validate([
            'product-name' => 'required|string|max:255',
            'product-category' => 'required|string|max:255',
            'product-description' => 'required|string|max:255',
            'product-price' => 'required|string|max:255',
            'product-price_discount' => 'required|string|max:255',
            // Tambahkan validasi untuk field lainnya sesuai kebutuhan
        ]);

        // Update data produk
        $product->update([
            'name' => $validatedData['product-name'],
            'category' => $validatedData['product-category'],
            'description' => $validatedData['product-description'],
            'price' => $validatedData['product-price'],
            'price_discount' => $validatedData['product-price_discount'],
            // Update field lainnya sesuai kebutuhan
        ]);

        // Redirect ke halaman tampil produk atau halaman lainnya
        return redirect()->route('tampil-product')->with('success', 'Produk berhasil diperbarui');
    }



    
    
}