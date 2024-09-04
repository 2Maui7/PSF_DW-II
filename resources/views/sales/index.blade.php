@extends('adminlte::page')
@section('title', 'Ventas')
@section('content_header')
    <h1>Ventas</h1>
@stop
@section('content')
<div class="container">
    <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">Añadir Venta</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cliente</th>
                        <th>Cantidad</th>
                        <th>Precio Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->product->name }}</td>
                            <td>{{ $sale->customer->name }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>${{ number_format($sale->total_price, 2) }}</td>
                            <td>{{ $sale->date->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('sales.show', $sale) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('sales.edit', $sale) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
