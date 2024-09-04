<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemCompra;
use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Support\Facades\DB;

class ItemCompraController extends Controller
{
    public function index()
    {
        // Recuperar todos los items de compras con paginación para mejor rendimiento
        $itemsCompras = ItemCompra::with(['producto', 'compra'])->paginate(10);
        return view('items_compras.index', compact('itemsCompras'));
    }

    public function create()
    {
        // Recuperar los productos y compras para el formulario
        $productos = Producto::all();
        $compras = Compra::all();
        return view('items_compras.create', compact('productos', 'compras'));
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'compra_id' => 'required|exists:compras,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ]);

        try {
            // Usar transacción para asegurar la consistencia de la base de datos
            DB::beginTransaction();

            // Crear el item de compra
            $itemCompra = ItemCompra::create($validatedData);

            // Actualizar el stock del producto
            $producto = Producto::findOrFail($request->producto_id);
            $producto->cantidad_stock += $request->cantidad;
            $producto->save();

            DB::commit();
            return redirect()->route('items_compras.index')->with('success', 'Item de compra creado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al crear el item de compra: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        // Recuperar el item de compra por su ID, incluyendo las relaciones
        $itemCompra = ItemCompra::with(['producto', 'compra'])->findOrFail($id);
        return view('items_compras.show', compact('itemCompra'));
    }

    public function edit($id)
    {
        // Recuperar el item de compra para edición
        $itemCompra = ItemCompra::findOrFail($id);

        // Recuperar los productos y compras para el formulario de edición
        $productos = Producto::all();
        $compras = Compra::all();
        return view('items_compras.edit', compact('itemCompra', 'productos', 'compras'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'compra_id' => 'required|exists:compras,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ]);

        try {
            // Usar transacción para asegurar la consistencia de la base de datos
            DB::beginTransaction();

            // Recuperar el item de compra y actualizar los datos
            $itemCompra = ItemCompra::findOrFail($id);

            // Revertir el stock del producto anterior
            $productoAnterior = Producto::findOrFail($itemCompra->producto_id);
            $productoAnterior->cantidad_stock -= $itemCompra->cantidad;
            $productoAnterior->save();

            // Actualizar el item de compra
            $itemCompra->update($validatedData);

            // Actualizar el stock del nuevo producto
            $productoNuevo = Producto::findOrFail($request->producto_id);
            $productoNuevo->cantidad_stock += $request->cantidad;
            $productoNuevo->save();

            DB::commit();
            return redirect()->route('items_compras.index')->with('success', 'Item de compra actualizado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al actualizar el item de compra: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        // Usar transacción para asegurar la consistencia de la base de datos
        DB::beginTransaction();
        try {
            // Recuperar el item de compra
            $itemCompra = ItemCompra::findOrFail($id);

            // Revertir el stock del producto
            $producto = Producto::findOrFail($itemCompra->producto_id);
            $producto->cantidad_stock -= $itemCompra->cantidad;
            $producto->save();

            // Eliminar el item de compra
            $itemCompra->delete();
            DB::commit();
            return redirect()->route('items_compras.index')->with('success', 'Item de compra eliminado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al eliminar el item de compra: ' . $e->getMessage()]);
        }
    }
}

