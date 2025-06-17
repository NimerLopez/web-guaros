<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // Columna autoincremental 'id'
            $table->string('name');  // Nombre del producto
            $table->text('description');  // Descripción larga
            $table->decimal('price', 10, 2);  // Precio con 10 dígitos y 2 decimales
            $table->string('image_url');  // URL de la imagen
            $table->string('category');  // Categoría (premium, estándar, etc.)
            $table->boolean('is_featured')->default(false);  // ¿Producto destacado?
            $table->integer('stock')->default(0);  // Cantidad en inventario
            $table->timestamps();  // created_at y updated_at automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
