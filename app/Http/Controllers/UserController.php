<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\medicRol;
use App\Models\Cita;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
       // $roles = Role::all();//->toArray();
        //dd($roles);
        $users = User::all();
        $medicRoles = medicRol::all();
        #print($medicroles);
        #$users = User::with('medicRol')->get();
        #$users = User::with('Role')->get();
        #$users = User::with('Rolmedic')->get();
        return view('usersviews', compact('users'),['medicRoles' => $medicRoles]);
    }
    public function create()
    {
        $users = User::all();
        return view('Crearusuario', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name',// => 'required|string|max:255',
            'email',//  => 'required|date',
            'password',// => 'required|date',
            'remember_token',// => 'nullable|string'
            'role_id',
            'role_medic_id',
            'medico_asignado'
        ]);
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->remember_token = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->role_medic_id = $request->input('role_medic_id');
        $user->medico_asignado = $request->input('medico_asignado');
        $user->save();
        $users = User :: all();
        $medicRoles = medicRol::all();
        return view('usersviews', compact('users'),['medicRoles' => $medicRoles]);
    }
    public function delete($id)
    {
        Cita::where('user_id', $id)->delete();
        User::find($id)->delete();
        $users = User :: all();
        $medicRoles = medicRol::all();
        return view('usersviews', compact('users'),['medicRoles' => $medicRoles]);    
    }

}

