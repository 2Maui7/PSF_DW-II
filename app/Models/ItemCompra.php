<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio',
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'pedido_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}