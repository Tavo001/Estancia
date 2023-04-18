@extends('layouts.master-dashboard')
@section('content')

<div class="container">
        <h1 class="h3 mb-3 font-weight-normal">Agregar Nuevo personal</h1>

        <form action="{{ route('guardar-usuario') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="role_id">Rol</label>
            <select name="role_id" id="role_id" class="form-control" required>
                <option value="">Seleccionar Rol</option>
                <option value="1">Paciente</option>
                <option value="2">Medico</option>
                <option value="3">Administrador</option>
                <option value="4">Recepcionista A</option>
                <option value="5">Recepcionista B</option>
            </select>
        </div>
         <div class="form-group" id="medico_options" style="display: none;">
            <label for="role_medic_id">Especialidad</label>
            <select name="role_medic_id" id="role_medic_id" class="form-control">
                <option value="">Seleccionar especialidad</option>
                <option value="1">Medico General</option>
                <option value="2">Oftalmólogo</option>
                <option value="3">Ginecólogo</option>
                <option value="4">Traumatólogo</option>
            </select>
        </div>
        <<div class="form-group" id="asignacion" style="display: none;">
            <label for="medico_asignado">Doctor asignado</label>
            <select name="medico_asignado" id="medico_asignado" class="form-control">
                @foreach ($users as $user)
                    @if ($user->role_id == 2)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <script>
            // Mostrar opciones de medico solo si se selecciona la opción "Medico" en el primer select
            document.getElementById("role_id").addEventListener("change", function() {
                var medicoOptions = document.getElementById("asignacion");
                if (this.value == "5") {
                    medicoOptions.style.display = "block";
                } else {
                    medicoOptions.style.display = "none";
                }
            });
        </script>
        <script>
            // Mostrar opciones de medico solo si se selecciona la opción "Medico" en el primer select
            document.getElementById("role_id").addEventListener("change", function() {
                var medicoOptions = document.getElementById("medico_options");
                if (this.value == "2") {
                    medicoOptions.style.display = "block";
                } else {
                    medicoOptions.style.display = "none";
                }
            });
        </script>

        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
    </form>
</div>

@endsection