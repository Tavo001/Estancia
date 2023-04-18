<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolmedicController extends Controller
{
    public function index()
    { 
        $rol = medicRol::with('users')->get();
        $rol = medicRol::find(1);
        $rol ->permissions()->sync([1,2,3,4,5,6,7,8]);
        return view('rolesviews', compact('rol'));
    }
}
