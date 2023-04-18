@extends('layouts.master-dashboard')
@section('content')
@include('layouts.alert')
@if(Auth::user()->role_id == 3)
<div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Registro de personal</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dar de alta o de baja al personal</li>
                            <img src="data:image/png;base64,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" alt="texto-descriptivo-de-la-imagen" style="width: 300px; height: 300px;">
                        </ul>
                        <a href="usuarios" class="btn btn-primary mt-3">Ir a registros personal</a>
                    </div>
                </div>
            </div>

            
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Registros de servicios medicos</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dar de alta o baja a recursos de clinica</li>
                            <img src=" https://dbdzm869oupei.cloudfront.net/img/sticker/preview/4748.png" alt="texto-descriptivo-de-la-imagen" style="width: 300px; height: 300px;">
                        </ul>
                        <a href="productos" class="btn btn-primary mt-3">Ir a registros medicos</a>
                    </div>
                </div>
            </div>


                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">definir horarios</h4>
                            <div class="card">
      <div class="card-header">
        Actualizar horarios de la clínica
      </div>
      <div class="card-body">

      <form action="{{ route('guardar-horario') }}" method="POST">
      @csrf

            <div class="form-group">
              <label for="dia_semana">Día de la semana:</label>
              <select class="form-control" id="dia_semana" name="dia_semana">
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
              <label for="horario_apertura">Horario de apertura:</label>
              <input type="time" class="form-control" id="horario_apertura" name="horario_apertura">
            </div>


            <div class="form-group">
              <label for="horario_cierre">Horario de cierre:</label>
              <input type="time" class="form-control" id="horario_cierre" name="horario_cierre">
            </div>


            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </form>
      </div>
    </div>
    
                    
                        </ul>
                    </div>
                </div>


                


                
            </div>
        </div>


        


        <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Administrar citas medicas</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dar de alta y asigacion de costos</li>
                            <img src="https://cdn-icons-png.flaticon.com/512/5799/5799397.png" alt="texto-descriptivo-de-la-imagen" style="width: 300px; height: 300px;">
                        </ul>
                        <a href="citas" class="btn btn-primary mt-3">Ir a citas</a>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                  <div class="card mb-4">
                      <div class="card-body">
                          <h4 class="card-title">Ver Mensajes</h4>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">Revisar nuevos mensajes</li>
                          </ul>
                          <img src="https://cdn-icons-png.flaticon.com/512/2011/2011775.png" alt="Icono de notificación" style="width: 100px; height: 100px;">
                          <a href="vermensajes" class="btn btn-primary mt-3">Ir a notificaciones</a>
                      </div>
                  </div>
              </div>







<style>

    .container {
max-width: 1200px;
margin: 0 auto;
}

.card {
background-color: #f8f8f8;
border-radius: 10px;
box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.2);
}

.card-title {
color: #333;
font-weight: bold;
font-size: 20px;
margin-bottom: 10px;
}

.list-group-item {
color: #666;
font-size: 16px;
border: none;
}

.list-group-item:hover {
background-color: #eee;
}

.alert {
background-color: #f2dede;
border: 1px solid #ebccd1;
border-radius: 4px;
color: #a94442;
margin-bottom: 20px;
padding: 15px;
}

.alert-success {
background-color: #dff0d8;
border-color: #d6e9c6;
color: #3c763d;
}

.alert-danger {
background-color: #f2dede;
border-color: #ebccd1;
color: #a94442;
}
</style>



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