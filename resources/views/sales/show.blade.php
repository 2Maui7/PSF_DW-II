@extends('adminlte::page')
@section('title', 'Ver Venta')
@section('content_header')
    <h1>Detalles de Venta</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalles de Venta</h5>
            <p class="card-text"><strong>Producto:</strong> {{ $sale->product->name }}</p>
            <p class="card-text"><strong>Cliente:</strong> {{ $sale->customer->name }}</p>
            <p class="card-text"><strong>Cantidad:</strong> {{ $sale->quantity }}</p>
            <p class="card-text"><strong>Precio Total:</strong> ${{ number_format($sale->total_price, 2) }}</p>
            <p class="card-text"><strong>Fecha:</strong> {{ $sale->date->format('d/m/Y') }}</p>
            <a href="{{ route('sales.edit', $sale) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Atras</a>
            <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@stop
