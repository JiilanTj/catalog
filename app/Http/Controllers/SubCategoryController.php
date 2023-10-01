<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;


class SubCategoryController extends Controller
{
    public function showAddForm()
    {
        $categories = Category::all();
        return view('add-subcategory', ['categories' => $categories]);
    }

    public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'category_id' => 'required', // Pastikan category_id terisi
    ]);

    SubCategory::create([
        'name' => $request->input('name'),
        'category_id' => $request->input('category_id'),
    ]);

    return redirect()->route('product.upload')
        ->with('success', 'Sub Category created successfully.');
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
