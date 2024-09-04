@extends('adminlte::page')
@section('title', 'Editar Producto')
@section('content_header')
    <h1>Editar Producto</h1>
@stop
@section('content')
<div class="container">
    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{ $producto->marca }}" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $producto->modelo }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $producto->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
        </div>
        <div class="form-group">
            <label for="cantidad_stock">Cantidad en Stock</label>
            <input type="number" class="form-control" id="cantidad_stock" name="cantidad_stock" value="{{ $producto->cantidad_stock }}" required>
        </div>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@stop