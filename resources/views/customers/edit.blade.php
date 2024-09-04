@extends('adminlte::page')
@section('title', 'Editar Cliente')
@section('content_header')
    <h1>Editar Cliente</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('customers.update', $customer) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre: </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Telefono: </label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="email">Correo Electronico: </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}">
                    </div>
                </div>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Atras</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@stop
