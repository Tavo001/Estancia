@extends('layouts.master-dashboard')
@section('content')
<div class="container">
<div class="card">
    <div class="card-header text-primary font-weight-bold" style="background-color: #E9E9E9">Roles</div>
    <div class="card-body">        
             <div class="text-center">
            <a  href="{{ route('crear-usuario') }}" class="btn btn-primary">
              Agregar personal
            </a>
            </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>contraseña</th>
                    <th>Rol</th>
                    <th>Rol de medico</th>
                    <th>Medico asignado</th>
                    <th>Eliminar Personal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#passwordModal{{ $user->id }}">
                                Ver contraseña
                            </button>
                        </td>

                        <td>{{ $user->Role->name }}</td> 

                        <td>
                        @foreach ($medicRoles as $medicRol)
                          @if ($medicRol->id == $user->role_medic_id)
                            <p>{{ $medicRol->Area }}</p>
                          @endif
                        @endforeach
                        </td>
                        <td>{{ $user->medico_asignado }}</td> 

                        <div class="modal fade" id="passwordModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="passwordModalLabel{{ $user->id }}">Contraseña del perfil {{ $user->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>La contraseña es: {{ $user->password }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                       
                        <td>
                                <a class="btn btn-danger btn-sm" href="{{ url('eliminar-usuario/'.$user->id) }}">
                                    <i class="fas fa-fw fa-trash"></i>
                                    Eliminar
                                </a>
                             </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>    
    </div>    
</div>

@endsection    