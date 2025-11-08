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
        // Vista home original - muestra todos los productos
        $products = Product::select('products.*', 'categories.slug as category', 'categories.name as category_name')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->get();

        view()->share('categories', Category::all());

        return view('home', compact('products'));
    }

    /**
     * Página de productos con filtrado por categoría
     */
    public function index(Request $request)
    {
        // Obtener todas las categorías
        $categories = Category::all();
        view()->share('categories', $categories);

        // Construir la consulta base
        $query = Product::select('products.*', 'categories.slug as category', 'categories.name as category_name')
            ->join('categories', 'products.category_id', '=', 'categories.id');

        // Filtrar por categoría si se especifica
        $categoryFilter = $request->get('category');
        if ($categoryFilter && $categoryFilter !== 'all') {
            $query->where('categories.slug', $categoryFilter);
        }

        // Obtener los productos
        $products = $query->orderBy('products.created_at', 'desc')->get();

        return view('products-page', compact('products', 'categories'));
    }

    /**
     * Obtener productos por categoría (para AJAX)
     */
    public function getByCategory(Request $request, $categorySlug = null)
    {
        $query = Product::select('products.*', 'categories.slug as category', 'categories.name as category_name')
            ->join('categories', 'products.category_id', '=', 'categories.id');

        if ($categorySlug && $categorySlug !== 'all') {
            $query->where('categories.slug', $categorySlug);
        }

        $products = $query->orderBy('products.created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'products' => $products,
            'count' => $products->count()
        ]);
    }

    /**
     * Validar stock disponible antes de agregar al carrito
     */
    public function validateStock(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::find($request->product_id);

        // Verificar si hay suficiente stock
        if ($product->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'No hay suficiente stock disponible. Stock actual: ' . $product->stock,
                'available_stock' => $product->stock
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Stock disponible',
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'available_stock' => $product->stock
            ]
        ]);
    }

}
