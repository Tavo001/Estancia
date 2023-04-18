<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Cita;
use App\Models\User;
use App\Models\medicRol;

class PerilController extends Controller
{
    public function doc()
    {
        $horarios = Horario::all();
        $citas = Cita :: all();
        //$mes_actual = date('m'); // Obtiene el número del mes actual
        //$citas_mes_actual = $citas->where('fecha_hora', 'like', "%-$mes_actual-%"); // Filtra las citas del mes actual
        return view('DoctorsProfile',compact('horarios','citas'));
    }
    public function admin()
    {
        return view('AdminProfile');
    }
    public function recepcionA()
    {
        $users = User :: all();
        $citas = Cita :: all();
        $medicRoles = medicRol::all();
        return view('RepAProfile',compact('citas','users','medicRoles'));
    }
    public function recepcionB()
    {
        $users = User :: all();
        $citas = Cita :: all();
        $medicRoles = medicRol::all();
        return view('RepBProfile',compact('citas','users','medicRoles'));
   
    }
}
