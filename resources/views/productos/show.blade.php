@extends('adminlte::page')
@section('title', 'Ver Producto')
@section('content_header')
    <h1>Detalles del Producto</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $producto->nombre }}</h5>
            <p class="card-text"><strong>Marca:</strong> {{ $producto->marca }}</p>
            <p class="card-text"><strong>Modelo:</strong> {{ $producto->modelo }}</p>
            <p class="card-text"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p class="card-text"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
            <p class="card-text"><strong>Cantidad en Stock:</strong> {{ $producto->cantidad_stock }}</p>
            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@stop