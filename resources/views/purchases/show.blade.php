@extends('adminlte::page')
@section('title', 'Ver Compra')
@section('content_header')
    <h1>Detalles de Compra</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalles de Compra</h5>
            <p class="card-text"><strong>Proveedor:</strong> {{ $purchase->supplier->name }}</p>
            <p class="card-text"><strong>Fecha:</strong> {{ $purchase->date->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Total Cantidad:</strong> ${{ number_format($purchase->total_amount, 2) }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $purchase->status }}</p>
            <a href="{{ route('purchases.edit', $purchase) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Atras</a>
            <form action="{{ route('purchases.destroy', $purchase) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@stop
