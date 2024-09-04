@extends('adminlte::page')
@section('title', 'Agregar artículo de compra')
@section('content_header')
    <h1>Agregar artículo de compra</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('purchase_items.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="purchase_id">Compra: </label>
                        <select class="form-control" id="purchase_id" name="purchase_id" required>
                            @foreach ($purchases as $purchase)
                                <option value="{{ $purchase->id }}">{{ $purchase->id }} - {{ $purchase->date->format('d/m/Y') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product_id">Producto: </label>
                        <select class="form-control" id="product_id" name="product_id" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="quantity">Cantidad: </label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Precio: </label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div>
                </div>
                <a href="{{ route('purchase_items.index') }}" class="btn btn-secondary">Atras</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@stop
