<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index()
    {
        // Recuperar todos los productos con paginación para mejorar el rendimiento
        $productos = Producto::paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad_stock' => 'required|integer|min:0',
        ]);

        try {
            // Crear el producto en la base de datos
            Producto::create($validatedData);
            return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
        } catch (\Exception $e) {
            // Manejar errores durante la inserción
            return back()->withErrors(['error' => 'Hubo un problema al crear el producto: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        // Recuperar el producto por su ID, incluyendo las relaciones con compras y ventas
        $producto = Producto::with(['itemsCompras', 'ventas'])->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        // Recuperar el producto para edición
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad_stock' => 'required|integer|min:0',
        ]);

        try {
            // Actualizar el producto en la base de datos
            $producto = Producto::findOrFail($id);
            $producto->update($validatedData);
            return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
        } catch (\Exception $e) {
            // Manejar errores durante la actualización
            return back()->withErrors(['error' => 'Hubo un problema al actualizar el producto: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        // Usar transacción para asegurar la consistencia de la base de datos
        DB::beginTransaction();
        try {
            // Recuperar el producto y verificar si tiene relaciones
            $producto = Producto::findOrFail($id);
            if ($producto->itemsCompras()->exists() || $producto->ventas()->exists()) {
                return back()->withErrors(['error' => 'No se puede eliminar el producto porque tiene compras o ventas asociadas.']);
            }

            // Eliminar el producto
            $producto->delete();
            DB::commit();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al eliminar el producto: ' . $e->getMessage()]);
        }
    }
}

