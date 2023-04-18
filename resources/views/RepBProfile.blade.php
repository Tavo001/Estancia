@extends('layouts.master-dashboard')
@section('content')
@include('layouts.alert')


@if(Auth::user()->role_id == 5)


<div class="row">
  <div class="col-md-12">
    <h3>Horarios de Doctores</h3>
    <hr>
    <div class="card-deck">
      @foreach($users as $user)
      @if($user->role_id == 2)
      @if(Auth::user()->medico_asignado == $user->name)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Dr. {{ $user->name }}</h5>
          <p>
            @foreach ($medicRoles as $medicRol)
            @if ($medicRol->id == $user->role_medic_id)
            <p>{{ $medicRol->Area }}</p>
            @endif
            @endforeach
          </p>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#agenda-{{ $user->id }}">Ver horario</a>
        </div>
      </div>
      @endif
      @endif
      @endforeach
    </div>
  </div>
</div>



@foreach($users as $user)
  <!-- Resto del código... -->

  <!-- Ventana modal para mostrar la agenda de citas -->
  <div class="modal fade" id="agenda-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Agenda de Citas - {{ date('F') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Seleccione el día para agregar una cita:</p>
          <div class="calendar-container">
            <div class="row">
              @for ($i = 1; $i <= date('t'); $i++)
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                      <h4 class="my-0 font-weight-normal">Día {{ $i }}</h4>
                    </div>
                    <div class="card-body">
                      <h1 class="card-title pricing-card-title">Horario de citas para el día {{ $i }}</h1>
                      @foreach($citas as $cita)
                        @if(date('j', strtotime($cita->fecha_cita)) == $i && $cita->user_id == $user->id)
                          <div style="background-color: #f2f2f2; padding: 10px;font-size: 18px">
                            <p style="font-size: 16px; font-weight: bold; color: #333;">Nombre del paciente: {{ $cita->Nombre_paciente }}</p>
                          </div>
                        @endif
                      @endforeach
                    </div>
                    <a href="citas" class="btn btn-primary mt-3">Ver citas</a>
                  </div>
                </div>
              @endfor
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endforeach
@else



<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Acceso Restringido</h5>
        <p class="card-text">Lo siento, no tienes permiso para acceder a esta página.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Volver al inicio</a>
      </div>
    </div>
  </div>
</div>
<style>
.card {
  margin-top: 50px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.3);
}
.card-title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}
.card-text {
  font-size: 18px;
  margin-bottom: 30px;
}
.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  border-radius: 5px;
  font-size: 18px;
  font-weight: bold;
}
.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}
</style>





@endif







<style>
.card{
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  max-width: 350px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-bottom: 20px;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #008CBA;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>


@endsection