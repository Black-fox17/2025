<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function showProducts()
    {
        $path = storage_path('app/public/products.json');
        dd($path, File::exists($path));
        // Ensure the correct path
        $products = json_decode(File::get($path), true); // Decode JSON into an array
        return view('products', ['products' => $products]);
    }
}
