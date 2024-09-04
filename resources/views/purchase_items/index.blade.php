@extends('adminlte::page')
@section('title', 'Artículos de compra')
@section('content_header')
    <h1>Artículos de compra</h1>
@stop
@section('content')
<div class="container">
    <a href="{{ route('purchase_items.create') }}" class="btn btn-primary mb-3">Añadir Artículos de compra</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Compra</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseItems as $item)
                        <tr>
                            <td>{{ $item->purchase->id }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>
                                <a href="{{ route('purchase_items.show', $item) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('purchase_items.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('purchase_items.destroy', $item) }}" method="POST" style="display:inline;">
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
