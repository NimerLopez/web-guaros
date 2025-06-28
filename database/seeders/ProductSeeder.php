<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Guaro Premium Reserva',
                'description' => 'Nuestra reserva especial, añejada por más tiempo para un sabor excepcional.',
                'price' => 15000,
                'image_url' => 'https://images.unsplash.com/photo-1527281400683-1aae777175f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80',
                'category_id' => 1,
                'is_featured' => true,
                'stock' => 50
            ],
            [
                'name' => 'Guaro Clásico',
                'description' => 'Nuestro guaro tradicional con el auténtico sabor costarricense.',
                'price' => 8500,
                'image_url' => 'https://images.unsplash.com/photo-1600271886742-f049cd5bba13?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80',
                'category_id' => 2,
                'is_featured' => false,
                'stock' => 100
            ],
            [
                'name' => 'Guaro de Miel',
                'description' => 'Suave guaro infusionado con miel pura de abeja.',
                'price' => 12000,
                'image_url' => 'https://images.unsplash.com/photo-1519181245277-cffeb31da2e3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                'category_id' => 3,
                'is_featured' => true,
                'stock' => 30
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
