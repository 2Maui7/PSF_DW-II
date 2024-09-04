<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function index()
    {
        // Recuperar todos los proveedores con paginación
        $proveedores = Proveedor::paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'nombre_contacto' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:proveedores,email',
            'direccion' => 'required|string|max:200',
        ]);

        try {
            // Crear el proveedor en la base de datos
            Proveedor::create($validatedData);
            return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un problema al crear el proveedor: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        // Recuperar el proveedor por su ID, incluyendo las relaciones con compras
        $proveedor = Proveedor::with('compras')->findOrFail($id);
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit($id)
    {
        // Recuperar el proveedor para edición
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'nombre_contacto' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:proveedores,email,' . $id,
            'direccion' => 'required|string|max:200',
        ]);

        try {
            // Actualizar el proveedor en la base de datos
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->update($validatedData);
            return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un problema al actualizar el proveedor: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        // Usar transacción para asegurar la consistencia de la base de datos
        DB::beginTransaction();
        try {
            // Recuperar el proveedor y verificar si tiene compras asociadas
            $proveedor = Proveedor::findOrFail($id);
            if ($proveedor->compras()->exists()) {
                return back()->withErrors(['error' => 'No se puede eliminar el proveedor porque tiene compras asociadas.']);
            }

            // Eliminar el proveedor
            $proveedor->delete();
            DB::commit();
            return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al eliminar el proveedor: ' . $e->getMessage()]);
        }
    }
}
