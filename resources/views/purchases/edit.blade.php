@extends('adminlte::page')
@section('title', 'Editar Compra')
@section('content_header')
    <h1>Editar Compra</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('purchases.update', $purchase) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="supplier_id">Proveedor</label>
                        <select class="form-control" id="supplier_id" name="supplier_id" required>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $supplier->id == $purchase->supplier_id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $purchase->date->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="total_amount">Total Cantidad</label>
                        <input type="number" step="0.01" class="form-control" id="total_amount" name="total_amount" value="{{ $purchase->total_amount }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Estado</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $purchase->status }}">
                    </div>
                </div>
                <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Atras</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@stop
