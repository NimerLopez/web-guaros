<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
   use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'slug'];

      public function products()
    {
        return $this->hasMany(Product::class);
    }
}
