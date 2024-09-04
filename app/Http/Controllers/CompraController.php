<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use App\Models\ItemCompra;
use App\Models\Producto; // Add this line to import the Producto model

class CompraController extends Controller
{
    public function index()
    {
        // Recuperar todas las compras con paginación para mejor rendimiento
        $compras = Compra::with('proveedor')->paginate(10);
        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        // Recuperar los proveedores para el formulario de creación
        $proveedores = Proveedor::all();
        return view('compras.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha_compra' => 'required|date',
            'monto_total' => 'required|numeric|min:0',
            'estado' => 'required|string|max:50',
        ]);

        try {
            // Usar transacción para asegurar la consistencia de la base de datos
            DB::beginTransaction();

            // Crear la compra
            $compra = Compra::create($validatedData);

            // Asignar items de compra si existen
            if ($request->has('items_compras')) {
                foreach ($request->items_compras as $item) {
                    $itemCompra = new ItemCompra([
                        'producto_id' => $item['producto_id'],
                        'cantidad' => $item['cantidad'],
                        'precio' => $item['precio'],
                    ]);
                    $compra->itemsCompras()->save($itemCompra);

                    // Actualizar el stock del producto
                    $producto = Producto::findOrFail($item['producto_id']);
                    $producto->cantidad_stock += $item['cantidad'];
                    $producto->save();
                }
            }

            DB::commit();
            return redirect()->route('compras.index')->with('success', 'Compra creada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al crear la compra: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        // Recuperar la compra por su ID, incluyendo las relaciones con proveedor y items de compra
        $compra = Compra::with(['proveedor', 'itemsCompras.producto'])->findOrFail($id);
        return view('compras.show', compact('compra'));
    }

    public function edit($id)
    {
        // Recuperar la compra para edición
        $compra = Compra::findOrFail($id);

        // Recuperar los proveedores para el formulario de edición
        $proveedores = Proveedor::all();
        return view('compras.edit', compact('compra', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha_compra' => 'required|date',
            'monto_total' => 'required|numeric|min:0',
            'estado' => 'required|string|max:50',
        ]);

        try {
            // Usar transacción para asegurar la consistencia de la base de datos
            DB::beginTransaction();

            // Recuperar la compra y actualizar los datos
            $compra = Compra::findOrFail($id);
            $compra->update($validatedData);

            // Si se actualizan items de compra
            if ($request->has('items_compras')) {
                // Eliminar los items de compra anteriores
                foreach ($compra->itemsCompras as $itemCompra) {
                    $producto = Producto::findOrFail($itemCompra->producto_id);
                    $producto->cantidad_stock -= $itemCompra->cantidad;
                    $producto->save();
                    $itemCompra->delete();
                }

                // Añadir los nuevos items de compra
                foreach ($request->items_compras as $item) {
                    $itemCompra = new ItemCompra([
                        'producto_id' => $item['producto_id'],
                        'cantidad' => $item['cantidad'],
                        'precio' => $item['precio'],
                    ]);
                    $compra->itemsCompras()->save($itemCompra);

                    // Actualizar el stock del producto
                    $producto = Producto::findOrFail($item['producto_id']);
                    $producto->cantidad_stock += $item['cantidad'];
                    $producto->save();
                }
            }

            DB::commit();
            return redirect()->route('compras.index')->with('success', 'Compra actualizada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al actualizar la compra: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        // Usar transacción para asegurar la consistencia de la base de datos
        DB::beginTransaction();
        try {
            // Recuperar la compra
            $compra = Compra::findOrFail($id);

            // Eliminar los items de compra asociados
            foreach ($compra->itemsCompras as $itemCompra) {
                // Revertir el stock del producto
                $producto = Producto::findOrFail($itemCompra->producto_id);
                $producto->cantidad_stock -= $itemCompra->cantidad;
                $producto->save();

                $itemCompra->delete();
            }

            // Eliminar la compra
            $compra->delete();
            DB::commit();
            return redirect()->route('compras.index')->with('success', 'Compra eliminada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al eliminar la compra: ' . $e->getMessage()]);
        }
    }
}