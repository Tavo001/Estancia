@extends('layouts.master-dashboard')
@section('content')
@include('layouts.alert')
@if(Auth::user()->role_id == 2)
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Ver Citas Agendadas</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Citas del Doctor</li>
                            <img src="https://cdn-icons-png.flaticon.com/512/7322/7322265.png" alt="texto-descriptivo-de-la-imagen" style="width: 300px; height: 300px;">
                            
                        </ul>
                        <a href="citas" class="btn btn-primary mt-3">Ver citas</a>
                    </div>
                </div>
            </div>
            
            
                    <div class="card">
        <div class="card-header">
            Actualizar horarios de trabajo
        </div>
        <div class="card-body">
            <form>
            <div class="form-group">
                <label for="dia-semana">Día de la semana:</label>
                <select class="form-control" id="dia-semana">
                <option>Lunes</option>
                <option>Martes</option>
                <option>Miércoles</option>
                <option>Jueves</option>
                <option>Viernes</option>
                <option>Sábado</option>
                <option>Domingo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="horario-apertura">Horario de apertura:</label>
                <input type="time" class="form-control" id="horario-apertura">
            </div>
            <div class="form-group">
                <label for="horario-cierre">Horario de cierre:</label>
                <input type="time" class="form-control" id="horario-cierre">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
        </div>




        <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Agenda de Citas - {{ date('F') }}</h3>
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
                  @if (Auth::check())
                  @foreach($citas as $cita)
                  @if (Auth::user()->id == $cita->user_id)
                    @if(date('j', strtotime($cita->fecha_cita)) == $i)
                   
                    <div style="background-color: #f2f2f2; padding: 10px;font-size: 18px">
                        <p style="font-size: 16px; font-weight: bold; color: #333;">Nombre del paciente: {{ $cita->Nombre_paciente }}</p>
                    </div>
          
                    @endif
                  @endif
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
          @endfor
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* Fuentes */
  body {
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    line-height: 1.5;
  }
  h1, h2, h3, h4, h5, h6 {
    font-family: 'Montserrat', sans-serif;
    font-weight: bold;
    line-height: 1.2;
  }
  
  /* Colores */
  :root {
    --primary-color: #4CAF50;
    --secondary-color: #424242;
    --light-color: #F5F5F5;
  }
  body {
    background-color: var(--light-color);
  }
  .btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
  }
  .btn-primary:hover {
    background-color: #3E8E41;
    border-color: #3E8E41;
  }
  .card-header, .card-footer {
    background-color: var(--secondary-color);
    color: white;
  }
  
  /* Dimensiones */
  .calendar-container {
    max-height: 500px;
    overflow-y: scroll;
  }
</style>



      
                
                    <div class="card-body">
                        <h4 class="card-title">Horarios fijos de la empresa</h4>
                        <ul class="list-group list-group-flush">
                       
                            <img src="https://cdn-icons-png.flaticon.com/512/4778/4778431.png" alt="texto-descriptivo-de-la-imagen" style="width: 300px; height: 300px;">
                        </ul>
                        <div class="container">
                    <h1 class="h3 mb-3 font-weight-normal">Horarios</h1>
                    <div class="row">
                        @foreach($horarios as $horario)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $horario->dia_semana }}</h5>
                                        <p class="card-text">Horario de apertura: {{ $horario->horario_apertura }}</p>
                                        <p class="card-text">Horario de cierre: {{ $horario->horario_cierre }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                    </div>
                </div>
            

        
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Contáctar con un administrador</h4>
                                <form method="POST" action="{{ route('mensajes.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="user_id_rela">Personal de contacto</label>
                                        <select class="form-control" id="user_id_rela" name="user_id_rela">
                                            <option value="">Seleccionar destinatario</option>
                                            <option value="3">Administrador</option>
                                            <option value="5">Recepcionista Propio</option>
                                            <option value="4">Recepcionista</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="mensaje">Mensaje</label>
                                        <textarea class="form-control" id="mensaje" rows="3" name="mensaje" placeholder="Escribe tu mensaje"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="importancia">Caso</label>
                                        <select class="form-control" id="caso" name="caso">
                                            <option value="Falla de sistema">Falla de sistema</option>
                                            <option value="Habilitar horario especial">Habilitar horario especial</option>
                                            <option value="Problema personal">Problema personal</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                                </form>
                            </div>
                        </div>
                    </div>
</div>

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






@endsection