<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class HomepageController extends Controller
{
    public function index()
    {
        // Retrieve products from the database
        $products = Product::all(); // You can modify this to retrieve products as needed

        // Pass the products data to the view
        return view('homepage', compact('products'));
    }



}
