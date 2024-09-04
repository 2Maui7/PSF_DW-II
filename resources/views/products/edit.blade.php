@extends('adminlte::page')
@section('title', 'Editar Producto')
@section('content_header')
    <h1>Editar Producto</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre: </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="brand">Marca: </label>
                        <input type="text" class="form-control" id="brand" name="brand" value="{{ $product->brand }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="model">Modelo: </label>
                        <input type="text" class="form-control" id="model" name="model" value="{{ $product->model }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Precio: </label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Descripcion: </label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="stock_quantity">Cantidad de Productos</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ $product->stock_quantity }}" required>
                    </div>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Atras</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@stop
