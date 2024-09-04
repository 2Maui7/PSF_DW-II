@extends('adminlte::page')
@section('title', 'Añadir Producto')
@section('content_header')
    <h1>Añadir Producto</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre: </label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="brand">Marca: </label>
                        <input type="text" class="form-control" id="brand" name="brand" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="model">Modelo: </label>
                        <input type="text" class="form-control" id="model" name="model" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Precio: </label>
                        <input type="number"class="form-control" id="price" name="price" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Descripcion: </label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="stock_quantity">Cantidad de Productos</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                    </div>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Atras</a>
                <button type="submit" class="btn btn-primary">guardar</button>
            </form>
        </div>
    </div>
</div>
@stop
