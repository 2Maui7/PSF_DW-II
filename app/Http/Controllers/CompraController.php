<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with('proveedor')->get();
        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('compras.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        Compra::create($request->all());
        return redirect()->route('compras.index');
    }

    public function show(Compra $compra)
    {
        return view('compras.show', compact('compra'));
    }

    public function edit(Compra $compra)
    {
        $proveedores = Proveedor::all();
        return view('compras.edit', compact('compra', 'proveedores'));
    }

    public function update(Request $request, Compra $compra)
    {
        $compra->update($request->all());
        return redirect()->route('compras.index');
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index');
    }
}

