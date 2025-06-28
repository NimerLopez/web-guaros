<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'category_id',
        'category',
    ];

    /**
     * Formatea el precio con el símbolo de colones
     */
    public function getFormattedPriceAttribute()
    {
        return '₡' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Obtiene los atributos para el carrito
     */
    public function getCartAttributesAttribute()
    {
        return [
            'data-id' => $this->id,
            'data-name' => $this->name,
            'data-price' => $this->price,
            'data-category' => $this->category
        ];
    }
}
