@extends('adminlte::page')
@section('title', 'Ver Proveedor')
@section('content_header')
    <h1>Detalles del Proveedor</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $proveedor->nombre }}</h5>
            <p class="card-text"><strong>Nombre de Contacto:</strong> {{ $proveedor->nombre_contacto }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $proveedor->email }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
            <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Volver</a>
            <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@stop