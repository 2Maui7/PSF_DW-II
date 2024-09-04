@extends('adminlte::page')
@section('title', 'Productos')
@section('content_header')
    <h1>Productos</h1>
@stop
@section('content')
    <div class="container">
        <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio</th>
                    <th>Cantidad en Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->marca }}</td>
                        <td>{{ $producto->modelo }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->cantidad_stock }}</td>
                        <td>
                            <a href="{{ route('productos.show', $producto) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
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