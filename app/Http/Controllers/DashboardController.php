<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function adminDashboard()
    {
        return view('admin-dashboard');
    }
    public function categoriasList()
    {
        $categories = Category::all();
        return view('categories-list', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
        ]);    
        Category::create($validated);    
        return redirect()->back()->with('success', 'Categoría creada exitosamente');
    }
    
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,'.$category->id,
        ]);
        
        $category->update($validated); 
        return redirect()->back()->with('success', 'Categoría actualizada exitosamente');
    }
    
    public function destroy(Category $category)
    {
        $category->delete();   
        return redirect()->back()->with('success', 'Categoría eliminada exitosamente');
    }

    public function ProductosIndex()
    {
        $products = Product::with('category')->orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        return view('product-form', compact('products', 'categories'));
    }
        public function storeProd(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'is_featured' => 'boolean',
            'stock' => 'required|integer|min:0'
        ]);
     
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image_url' => $validated['image_url'],
            'category_id' => $validated['category_id'],
            'is_featured' => $validated['is_featured'] ?? false,
            'stock' => $validated['stock']
        ]);
        
        return redirect()->route('products.index')
               ->with('success', 'Producto creado exitosamente');
    }
    
    public function updateProd(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'is_featured' => 'boolean',
            'stock' => 'required|integer|min:0'
        ]);

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'image_url' => $validated['image_url'],
            'is_featured' => $validated['is_featured'] ?? false,
            'stock' => $validated['stock']
        ];
       
        $product->update($data);
        
        return redirect()->route('products.index')
               ->with('success', 'Producto actualizado exitosamente');
    }
    
    public function destroyProd(Product $product)
    {
        $product->delete();   
        return redirect()->route('products.index')
               ->with('success', 'Producto eliminado exitosamente');
    }

}