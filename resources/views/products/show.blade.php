@extends('adminlte::page')
@section('title', 'Ver Producto')
@section('content_header')
    <h1>Detalles de Producto</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text"><strong>Marca: </strong> {{ $product->brand }}</p>
            <p class="card-text"><strong>Modelo: </strong> {{ $product->model }}</p>
            <p class="card-text"><strong>Descripcion: </strong> {{ $product->description }}</p>
            <p class="card-text"><strong>Precio: </strong> ${{ number_format($product->price, 2) }}</p>
            <p class="card-text"><strong>Cantidad de Producto: </strong> {{ $product->stock_quantity }}</p>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Atras</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@stop
