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
        'product-images1.*' => 'image|max:2048',
        'product-images2.*' => 'image|max:2048',
        'product-images3.*' => 'image|max:2048',
        'product-images4.*' => 'image|max:2048',
        'product-images5.*' => 'image|max:2048',
    ]);

    // Process the uploaded files and store them
    $imagePaths = [];
    $imagePaths1 = [];
    $imagePaths2 = [];
    $imagePaths3 = [];
    $imagePaths4 = [];
    $imagePaths5 = [];

    // Process and store main product image
    if ($request->hasFile('product-images')) {
        foreach ($request->file('product-images') as $image) {
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $imagePaths[] = 'uploads/' . $imageName;
        }
    }

    // Process and store additional images
    // You can repeat this block for each additional image input
    if ($request->hasFile('product-images1')) {
        foreach ($request->file('product-images1') as $image) {
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $imagePaths1[] = 'uploads/' . $imageName;
        }
    }

    if ($request->hasFile('product-images2')) {
        foreach ($request->file('product-images2') as $image) {
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $imagePaths2[] = 'uploads/' . $imageName;
        }
    }


    if ($request->hasFile('product-images3')) {
        foreach ($request->file('product-images3') as $image) {
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $imagePaths3[] = 'uploads/' . $imageName;
        }
    }

    if ($request->hasFile('product-images4')) {
        foreach ($request->file('product-images4') as $image) {
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $imagePaths4[] = 'uploads/' . $imageName;
        }
    }

    if ($request->hasFile('product-images5')) {
        foreach ($request->file('product-images5') as $image) {
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $imagePaths5[] = 'uploads/' . $imageName;
        }
    }

    // Create a new Product instance with image paths
    $product = new Product([
        'name' => $validatedData['product-name'],
        'category' => $validatedData['product-category'],
        'description' => $validatedData['product-description'],
        'price' => $validatedData['product-price'],
        'price_discount' => $validatedData['product-price-discount'],
        'images' => json_encode($imagePaths),  // Store main product image
        'images1' => json_encode($imagePaths1), // Store additional images
        'images2' => json_encode($imagePaths2), // Store additional images
        'images3' => json_encode($imagePaths3), // Store additional images
        'images4' => json_encode($imagePaths4), // Store additional images
        'images5' => json_encode($imagePaths5), // Store additional images
        // Repeat for other image columns (images2, images3, etc.)
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