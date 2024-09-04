@extends('adminlte::page')

@section('title', 'Panel de Control de Tienda de Móviles')

@section('content_header')
    <h1>Bienvenido a la Tienda de PhoneStore</h1>
@stop

@section('content')
<div class="container">
    <div class="jumbotron text-center">
        <h1 class="display-4">Bienvenido a la tienda PhoneStore</h1>
        <p class="lead">la tienda para los últimos y mejores teléfonos móviles.</p>
        <hr class="my-4">
        <p>Administra tus productos, proveedores, ventas y más.</p>
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg btn-block">
                    <img src="https://imgs.search.brave.com/o9aJOvvKlmP9ERp-lcQBgBLO7nj4a9k5MWP_fcdN7GM/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzL2E2L2Ez/LzZjL2E2YTM2YzE1/Y2Y3M2Y0MzdlYzJh/YjIyNDMwMmRiMGNm/LmpwZw" alt="Productos" class="img-fluid mb-2">
                    Productos
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('suppliers.index') }}" class="btn btn-success btn-lg btn-block">
                    <img src="https://imgs.search.brave.com/_ZbkIJbkplYv45dvnURozAjlL8WDWQc0bgviB5BpACY/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/Zm90b3MtcHJlbWl1/bS9uZWdvY2lhci1h/Y3VlcmRvcy1wcm92/ZWVkb3Jlcy1mbGV4/aWJsZXMtcGVxdWVu/YXMtZW1wcmVzYXMt/Z2VuZXJhZG9yYXNf/MTE5ODIzMC02Njc1/Ny5qcGc_c2l6ZT02/MjYmZXh0PWpwZw" alt="Proveedores" class="img-fluid mb-2">
                    Proveedores
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('customers.index') }}" class="btn btn-info btn-lg btn-block">
                    <img src="https://imgs.search.brave.com/yNLMaINNjtp7YAR4nYKbjo7ki2i7gbMYCCIALVcp-3g/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvNjIz/NTg2ODEwL2VzL2Zv/dG8vam92ZW4taGVy/bW9zYS1jaGljYS1l/c3QlQzMlQTEtZGUt/Y29tcHJhcy1lbi1l/bC1jZW50cm8tY29t/ZXJjaWFsLmpwZz9z/PTYxMng2MTImdz0w/Jms9MjAmYz1LS0Ew/TVJQeFNZT05sYU5q/MDFhdnVLVTJBdXgw/Ui1DU0R4VkdjOE9q/MzFVPQ" alt="Clientes" class="img-fluid mb-2">
                    Clientes
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('sales.index') }}" class="btn btn-warning btn-lg btn-block">
                    <img src="https://imgs.search.brave.com/pukRUWbN8C4R4eDqY8Of5AevD5NsHQ9cqzlCQ71Luc0/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvNTE2/ODI3OTgwL2VzL2Zv/dG8vY29uY2VwdG8t/ZGUtY29tcHJhcy1l/bi1sJUMzJUFEbmVh/LmpwZz9zPTYxMng2/MTImdz0wJms9MjAm/Yz1Bb2VFeW40UHV4/NE1uZDlVU2dIVnN5/UTM5MXRzMUlndGJU/eE5hcGdrQW5nPQ" alt="Ventas" class="img-fluid mb-2">
                    Ventas
                </a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Añadir aquí estilos adicionales --}}
    <style>
        .jumbotron {
            background-color: #f8f9fa;
            padding: 2rem 1rem;
            border-radius: .3rem;
            text-align: center;
            background-image: url('https://imgs.search.brave.com/js07sFBL2Yq6-UczMK7zZn9A7ShAfXteyRZD8_q3mM4/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/cHNkLXByZW1pdW0v/Zm9uZG8tdmFjaW8t/bHV6LXN1YXZlLWZv/bmRvLWVzY3JpdG9y/aW8taG9yaXpvbnRh/bC1hYnN0cmFjdG8t/cHNkLXRlbG9uLWZv/bmRvLXBhbm9yYW1p/Y28tNGtfNjkxNTYw/LTI4LmpwZz9zaXpl/PTYyNiZleHQ9anBn'); /* Imagen de fondo opcional */
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .btn-lg {
            padding: .5rem 1rem;
            font-size: 1.25rem;
            border-radius: .3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .btn-block {
            display: block;
            width: 100%;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .btn img {
            width: 100px; /* Ajustar tamaño de imagen si es necesario */
        }
    </style>
@stop

@section('js')
    <script> console.log("¡Bienvenido al Panel de Control de la Tienda de Móviles!"); </script>
@stop
