@extends('adminlte::page')
@section('title', 'Vista CusClientetomer')
@section('content_header')
    <h1>Detalles de Cliente</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $customer->name }}</h5>
            <p class="card-text"><strong>Telefono: </strong> {{ $customer->phone }}</p>
            <p class="card-text"><strong>Correo Electronico: </strong> {{ $customer->email }}</p>
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Atras</a>
            <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@stop
