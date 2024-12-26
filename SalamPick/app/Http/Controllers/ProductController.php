<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function showProducts()
    {
        $path = storage_path('app/public/products.json');
        $jsonData = json_decode(File::get($path), true);
        $products = $jsonData['products'] ?? [];
        return view('products', ['products' => $products]);
    }
}
