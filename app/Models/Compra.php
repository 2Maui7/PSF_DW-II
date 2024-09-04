<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';
    protected $fillable = [
        'proveedor_id',
        'fecha_pedido',
        'monto_total',
        'estado',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function itemsCompras()
    {
        return $this->hasMany(ItemCompra::class);
    }
}
