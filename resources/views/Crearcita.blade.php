@extends('layouts.master-dashboard')
@section('content')

<div class="container">
        <h1 class="h3 mb-3 font-weight-normal">Agregar Nueva Cita</h1>
        <form action="{{ route('guardar-cita') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="Nombre_paciente">Nombre del Paciente</label>
                <input type="text" name="Nombre_paciente" id="Nombre_paciente" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha_cita">Fecha de Cita</label>
                <input type="date" name="fecha_cita" id="fecha_cita" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>



           <div class="form-group">
                <label for="user_id">Doctor asignado</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        @if ($user->role_id == 2)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="hora_cita">Hora de cita</label>
                <input type="time" class="form-control" id="hora_cita" name="hora_cita">
            </div>
            <div class="form-group">
                <label for="status">Estado</label>
                <select name="status" id="status" class="form-control" disabled>
                    <option value="0" selected>Pendiente</option>
                </select>
            </div>

            <div class="form-group">
                <label for="costo_cita">Costo de la Cita</label>
                <input type="number" name="costo_cita" id="costo_cita" class="form-control" step="0.01" readonly placeholder="a considerar">
            </div>




            <button type="submit" class="btn btn-primary">Guardar Cita</button>
        </form>
    </div>



@endsection