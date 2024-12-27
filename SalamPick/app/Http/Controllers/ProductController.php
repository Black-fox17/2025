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
        return view('main', ['products' => $products]);
    }
    public function getProduct($id){
        $path = storage_path('app/public/products.json');
        
        if (!File::exists($path)) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        $jsonData = json_decode(File::get($path), true);
        $products = $jsonData['products'] ?? [];
        
        $product = collect($products)->firstWhere('id', $id);
        
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
        
        return view('product', ['product' => $product]);
    }
}
