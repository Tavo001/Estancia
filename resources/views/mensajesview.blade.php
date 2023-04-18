@extends('layouts.master-dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Notificaciones</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Mensaje</th>
                                    <th>Caso</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mensajes as $mensaje)
                                @if(Auth::user()->role_id == $mensaje->user_id_rela)
                                <tr>
                                    <td>{{$mensaje->mensaje}}</td>
                                    <td>{{$mensaje->caso}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
