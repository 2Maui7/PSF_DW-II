@extends('adminlte::page')
@section('title', 'Proveedores')
@section('content_header')
    <h1>Proveedores</h1>
@stop
@section('content')
<div class="container">
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Añadir Proveedor</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Nombre de Contacto</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->contact_name }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>
                                <a href="{{ route('suppliers.show', $supplier) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
