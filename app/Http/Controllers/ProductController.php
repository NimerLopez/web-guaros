<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function Home()
    {
        $products = Product::all();
        $categories = Product::select('category')->distinct()->get()->pluck('category');   
        return view('home', compact('products', 'categories'));
    }

}
