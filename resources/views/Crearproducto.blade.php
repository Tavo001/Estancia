@extends('layouts.master-dashboard')
@section('content')

<div class="container">
        <h1 class="h3 mb-3 font-weight-normal">Agregar Nueva Cita</h1>

<form action="{{ route('guardar-producto') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio del Producto</label>
            <input type="number" name="precio" id="precio" class="form-control" min="0" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Producto</button>
    </form>
</div>
@endsection