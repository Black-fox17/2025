<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function showProducts()
    {
        $path = storage_path('app/public/products.json'); // Ensure the correct path
        $products = json_decode(File::get($path), true); // Decode JSON into an array
        return view('products', ['products' => $products]);
    }
}
