@extends('layouts.master-dashboard')
@section('content')
@include('layouts.alert')
<div class="container">
    <div class="card">
        <div class="card-header text-primary font-weight-bold" style="background-color: #E9E9E9">Productos</div>
        <div class="card-body">
            <h1 class="h3 text-center">Lista de Productos</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Producto</th>
                        <th>Costo</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->Nombre}}</td>
                            <td><a>$</a>{{ $producto->Precio }}<a> MXN</a></td>
                            <td>{{ $producto->Descripcion }}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ url('eliminar-producto/'.$producto->id) }}">
                                    <i class="fas fa-fw fa-trash"></i>
                                    Eliminar
                                </a>
                             </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
            <a  href="{{ route('crear-producto') }}" class="btn btn-primary">
              Agregar nuevo producto
            </a>
            </div>
        </div>
    </div>
</div>

@endsection