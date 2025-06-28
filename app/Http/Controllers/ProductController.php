<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function Home()
    {
       $products = Product::select('products.*', 'categories.slug as category')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->get();
        view()->share('categories', Category::all());
    
    return view('home', compact('products'));
    }

}
