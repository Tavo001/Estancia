@extends('layouts.master-dashboard')
@section('content')




<form action="{{ url('editar-cita/'.$cita->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="nombre_paciente">Nombre del paciente:</label>
    <input type="text" class="form-control" id="nombre_paciente" name="nombre_paciente" value="{{ $cita->Nombre_paciente }}">
  </div>
  <div class="form-group">
    <label for="fecha_solicitud">Fecha de solicitud:</label>
    <input type="date" class="form-control" id="fecha_solicitud" name="fecha_solicitud" value="{{ $cita->fecha_solicitud }}">
  </div>
  <div class="form-group">
    <label for="fecha_cita">Fecha de cita:</label>
    <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" value="{{ $cita->fecha_cita }}">
  </div>
  <div class="form-group">
    <label for="description">Descripción:</label>
    <textarea class="form-control" id="description" name="description">{{ $cita->description }}</textarea>
  </div>
  <div class="form-group">
    <label for="user_id">Doctor:</label>
    <select class="form-control" id="user_id" name="user_id">
      @foreach ($users as $user)
        <option value="{{ $user->id }}" {{ $cita->user_id == $user->id ? 'selected' : '' }}>Dr. {{ $user->name }}</option>
      @endforeach
    </select>
  </div>

  @if(Auth::user()->role_id == 3)
  <div class="form-group">
    <label for="costo_cita">Costo:</label>
    <input type="number" class="form-control" id="costo_cita" name="costo_cita" value="{{ $cita->costo_cita }}">
  </div>
   
  <div class="form-group">
    <div class="form-group form-check">
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="status" name="status" {{ $cita->status ? 'checked' : '' }}>
          <label class="custom-control-label" for="status">Estado de aprobacion de la cita</label>
      </div>
  </div>

</div>
@endif


  <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>




@endsection
