<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function index()
    {
    $horarios = Horario::all();
    return view('AdminProfile', compact('horarios'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'dia_semana',// => 'required|string|max:255',
            'horario_apertura',//  => 'required|date',
            'horario_cierre'// => 'nullable|string'
        ]);
         // Busca si ya existe un horario para el día de la semana seleccionado
        $horario = Horario::where('dia_semana', $request->dia_semana)->first();
        if ($horario) {
            $horario->update([
                'horario_apertura' => $request->horario_apertura,
                'horario_cierre' => $request->horario_cierre
            ]);
        }else {
            // Si el horario no existe, crea uno nuevo
            Horario::create([
                'dia_semana' => $request->dia_semana,
                'horario_apertura' => $request->horario_apertura,
                'horario_cierre' => $request->horario_cierre
            ]);
        }
        $horarios = Horario::all();
         return view('AdminProfile', compact('horarios'));
    }
    
}
