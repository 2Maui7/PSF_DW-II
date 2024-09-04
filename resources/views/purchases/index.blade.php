@extends('adminlte::page')
@section('title', 'Compras')
@section('content_header')
    <h1>Compras</h1>
@stop
@section('content')
<div class="container">
    <a href="{{ route('purchases.create') }}" class="btn btn-primary mb-3">Añadir Compra</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Proveedor</th>
                        <th>Fecha</th>
                        <th>Total Cantidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->supplier->name }}</td>
                            <td>{{ $purchase->date->format('d/m/Y') }}</td>
                            <td>${{ number_format($purchase->total_amount, 2) }}</td>
                            <td>{{ $purchase->status }}</td>
                            <td>
                                <a href="{{ route('purchases.show', $purchase) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('purchases.edit', $purchase) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('purchases.destroy', $purchase) }}" method="POST" style="display:inline;">
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
