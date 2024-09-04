<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'marca',
        'modelo',
        'descripcion',
        'precio',
        'cantidad_stock',
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

    public function itemsCompras()
    {
        return $this->hasMany(ItemCompra::class);
    }
}
