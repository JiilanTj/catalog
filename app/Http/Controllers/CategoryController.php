<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function showAddForm()
{
    return view('add-category');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories|max:255',
    ]);

    Category::create([
        'name' => $request->input('name'),
    ]);

    return redirect()->route('product.upload')->with('success', 'Category added successfully.');
}

public function showDeleteCategoryPage()
{
    $categories = Category::all(); // Fetch all categories from the database
    return view('delete-category', compact('categories'));
}

public function deleteCategory(Request $request)
{
    $categoryId = $request->input('category_id');
    $category = Category::find($categoryId);

    if ($category) {
        $category->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    } else {
        return redirect()->back()->with('error', 'Kategori tidak ditemukan');
    }
}



}
