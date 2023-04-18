@extends('layouts.master-dashboard')
@section('content')
@include('layouts.alert')

<div class="container">
    <div class="card">
        <div class="card-header text-primary font-weight-bold" style="background-color: #E9E9E9">Citas</div>
        <div class="card-body">
            <h1 class="h3 text-center">Lista de Citas</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Paciente</th>
                        <th>Fecha en la cual se solicito</th>
                        <th>Fecha de la cita</th>
                        <th>Hora de la cita</th>
                        <th>Descripción</th>
                        <th>Doctor asignado</th>
                        <th>Estado de cita</th>
                        <th>Costo de la cita</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                    @if (Auth::user()->id == $cita->user_id || Auth::user()->role_id == 3)
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->Nombre_paciente}}</td>
                            <td>{{ $cita->fecha_solicitud }}</td>
                            <td>{{ $cita->fecha_cita }}</td>
                            <td>{{ $cita->hora_cita }}</td>
                            <td>{{ $cita->description }}</td>
                            <td>
                                @foreach ($users as $user)
                                    @if ($cita->user_id == $user->id)
                                        <option value="{{ $cita->user_id }}">Dr. {{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($cita->status)
                                    <i class="fas fa-check text-success"></i>
                                @else
                                    <i class="fas fa-times text-danger"></i>
                                @endif
                            </td>
                            <td>{{ $cita->costo_cita ? $cita->costo_cita : 'A considerar' }}</td>


                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ url('editar-cita/'.$cita->id) }}">
                                    <i class="fas fa-fw fa-edit"></i>
                                    Editar
                                </a>
                            </td>
                            
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ url('eliminar-cita/'.$cita->id) }}">
                                    <i class="fas fa-fw fa-trash"></i>
                                    Eliminar
                                </a>
                             </td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            @if(in_array(Auth::user()->role_id, [2, 4, 5]))
            <div class="text-center">
            <a  href="{{ route('crear-cita') }}" class="btn btn-primary">
              Agendar nueva Cita
            </a>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection