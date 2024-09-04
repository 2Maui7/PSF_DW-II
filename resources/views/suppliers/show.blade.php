@extends('adminlte::page')
@section('title', 'Ver Proveedor')
@section('content_header')
    <h1>Detalles de Proveedor</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $supplier->name }}</h5>
            <p class="card-text"><strong>Nombre de Contacto:</strong> {{ $supplier->contact_name }}</p>
            <p class="card-text"><strong>Telefono: </strong> {{ $supplier->phone }}</p>
            <p class="card-text"><strong>Correo Electronico: </strong> {{ $supplier->email }}</p>
            <p class="card-text"><strong>Direccion: </strong> {{ $supplier->address }}</p>
            <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Atras</a>
            <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@stop
