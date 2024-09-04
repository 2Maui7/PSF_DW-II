@extends('adminlte::page')
@section('title', 'Vista Artículo de compra')
@section('content_header')
    <h1>Detalles de Artículo de compra</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalles de Artículo de compra</h5>
            <p class="card-text"><strong>Compra: </strong> {{ $item->purchase->id }} - {{ $item->purchase->date->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Producto: </strong> {{ $item->product->name }}</p>
            <p class="card-text"><strong>Cantidad: </strong> {{ $item->quantity }}</p>
            <p class="card-text"><strong>Precio: </strong> ${{ number_format($item->price, 2) }}</p>
            <a href="{{ route('purchase_items.edit', $item) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('purchase_items.index') }}" class="btn btn-secondary">atras</a>
            <form action="{{ route('purchase_items.destroy', $item) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@stop
