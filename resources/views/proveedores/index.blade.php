@extends('adminlte::page')
@section('title', 'Proveedores')
@section('content_header')
    <h1>Proveedores</h1>
@stop
@section('content')
<div class="container">
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">Agregar Proveedor</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nombre de Contacto</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->nombre_contacto }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->email }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>
                        <a href="{{ route('proveedores.show', $proveedor) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" style="display:inline;">
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
@stop