@extends('adminlte::page')
@section('title', 'Editar Proveedor')
@section('content_header')
    <h1>Editar Proveedor</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contact_name">Nombre de Contacto</label>
                        <input type="text" class="form-control" id="contact_name" name="contact_name" value="{{ $supplier->contact_name }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Telefono</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $supplier->phone }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Correo Electronico</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $supplier->email }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="address">Direccion</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ $supplier->address }}</textarea>
                    </div>
                </div>
                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Atras</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@stop
