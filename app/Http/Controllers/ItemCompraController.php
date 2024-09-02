<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemCompra;
use App\Models\Producto;
use App\Models\Compra;

class ItemCompraController extends Controller
{
    public function index()
    {
        $itemsCompras = ItemCompra::with('producto', 'compra')->get();
        return view('items_compras.index', compact('itemsCompras'));
    }

    public function create()
    {
        $productos = Producto::all();
        $compras = Compra::all();
        return view('items_compras.create', compact('productos', 'compras'));
    }

    public function store(Request $request)
    {
        ItemCompra::create($request->all());
        return redirect()->route('items_compras.index');
    }

    public function show(ItemCompra $itemCompra)
    {
        return view('items_compras.show', compact('itemCompra'));
    }

    public function edit(ItemCompra $itemCompra)
    {
        $productos = Producto::all();
        $compras = Compra::all();
        return view('items_compras.edit', compact('itemCompra', 'productos', 'compras'));
    }

    public function update(Request $request, ItemCompra $itemCompra)
    {
        $itemCompra->update($request->all());
        return redirect()->route('items_compras.index');
    }

    public function destroy(ItemCompra $itemCompra)
    {
        $itemCompra->delete();
        return redirect()->route('items_compras.index');
    }
}

