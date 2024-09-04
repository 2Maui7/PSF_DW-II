@extends('adminlte::page')
@section('title', 'Editar Venta')
@section('content_header')
    <h1>Editar Venta</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sales.update', $sale) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="product_id">Producto</label>
                        <select class="form-control" id="product_id" name="product_id" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $sale->product_id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="customer_id">Cliente</label>
                        <select class="form-control" id="customer_id" name="customer_id" required>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $customer->id == $sale->customer_id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="quantity">Cantidad</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $sale->quantity }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="total_price">Precio Total</label>
                        <input type="number" step="0.01" class="form-control" id="total_price" name="total_price" value="{{ $sale->total_price }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date">Fecha</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $sale->date->format('Y-m-d') }}" required>
                </div>
                <a href="{{ route('sales.index') }}" class="btn btn-secondary">Atras</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@stop
