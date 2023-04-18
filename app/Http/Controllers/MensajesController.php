<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mensajes;

class MensajesController extends Controller
{
    public function index()
    {
        $mensajes = mensajes::all();
        return view('mensajesview',compact('mensajes'));
    }

    public function store(Request $request)
    {
        $mensaje = new mensajes();
        $mensaje->user_id_rela =  $request->user_id_rela;
        $mensaje->mensaje = $request->mensaje;
        $mensaje->caso = $request->caso;
        $mensaje->save();

        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }
}
