<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;


class SubCategoryController extends Controller
{
    public function showAddForm()
{
    return view('add-subcategory');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories|max:255',
    ]);

    SubCategory::create([
        'name' => $request->input('name'),
    ]);

    return redirect()->route('product.upload')->with('success', 'SubCategory added successfully.');
}

public function showDeleteSubCategoryPage()
{
    $subcategories = SubCategory::all(); // Fetch all categories from the database
    return view('delete-subcategory', compact('sub-categories'));
}

public function deleteSubCategory(Request $request)
{
    $subcategoryId = $request->input('sub_category_id');
    $subcategory = SubCategory::find($subcategoryId);

    if ($subcategory) {
        $subcategory->delete();
        return redirect()->back()->with('success', 'SubCategory deleted successfully');
    } else {
        return redirect()->back()->with('error', 'SubCategory not found');
    }
}

}
