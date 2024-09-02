<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('producto', 'cliente')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('ventas.create', compact('productos', 'clientes'));
    }

    public function store(Request $request)
    {
        Venta::create($request->all());
        return redirect()->route('ventas.index');
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('ventas.edit', compact('venta', 'productos', 'clientes'));
    }

    public function update(Request $request, Venta $venta)
    {
        $venta->update($request->all());
        return redirect()->route('ventas.index');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
