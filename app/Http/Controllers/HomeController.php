<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\User;

use App\Models\Cita;

use App\Models\medicRol;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $horarios = Horario::all();
        if(auth()->user()->role_id == 1){
            return view('home', compact('horarios'));
        }elseif(auth()->user()->role_id == 2){
            $horarios = Horario::all();
            $citas = Cita :: all();
            return view('Doctorsprofile',compact('horarios','citas'));
        }elseif(auth()->user()->role_id == 3){
            return view('AdminProfile', compact('horarios'));
        }elseif(auth()->user()->role_id == 4){
            $users = User :: all();
            $citas = Cita :: all();
            $medicRoles = medicRol::all();
            return view('RepAProfile', compact('citas','users','medicRoles'));
        }elseif(auth()->user()->role_id == 5){
            $users = User :: all();
            $citas = Cita :: all();
            $medicRoles = medicRol::all();
            return view('RepBProfile',compact('citas','users','medicRoles'));
        }
        return view('home', compact('horarios'));
    }
    
    public function logout(Request $request)
{
    $this->guard()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

}
