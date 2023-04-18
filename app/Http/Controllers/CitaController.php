<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cita;
use App\Models\User;
use App\Models\Horario;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita :: all();
        $users = User :: all();
        return view('citasview', compact('citas','users'));
    }
    public function calendar()
    {
        $citas = Cita :: all();
        return view('Calendarview', compact('citas'));
    }
    public function create()
    {
    $users = User::all();
    return view('Crearcita',compact('users'));
    }

    public function store(Request $request)
    {
         // Obtener la fecha actual
    $fecha_actual = now();

    // Convertir la fecha de la cita y la fecha actual en timestamp
    $timestamp_cita = strtotime($request->fecha_cita);
    $timestamp_actual = strtotime($fecha_actual);

     // Si la fecha de la cita es anterior a la fecha actual, mostrar un mensaje de error
     if ($timestamp_cita < $timestamp_actual) {
        return redirect()->back()->with('error', 'La fecha de la cita no puede ser anterior a la fecha actual.');
    }
    
    // Validar que la hora de la cita esté dentro de los horarios de la clínica
    $hora_cita = Carbon::parse($request->hora_cita);
    $horarios = Horario::where('dia_semana', $hora_cita->englishDayOfWeek)
                        ->where('horario_apertura', '<=', $hora_cita->format('H:i:s'))
                        ->where('horario_cierre', '>=', $hora_cita->format('H:i:s'))
                        ->exists();
    
    if (!$horarios) {
        return redirect()->back()->with('error', 'La hora de la cita está fuera de los horarios de atención de la clínica.');
    }
    
    // Verificar si ya existe una cita programada para la misma fecha y hora
    $existe_cita = Cita::where('fecha_cita', $request->fecha_cita)
                ->where('hora_cita', $request->hora_cita)
                ->exists();

    if ($existe_cita) {
        return redirect()->back()->with('error', 'Ya existe una cita programada para esta fecha y hora.');
    }
        
        $cita = new Cita();
        $users = User :: all();
        $cita->Nombre_paciente = $request->input('Nombre_paciente');
        $cita->fecha_solicitud = now()->format('Y-m-d'); // asignar la fecha actual
        $cita->fecha_cita = $request->input('fecha_cita');
        $cita->hora_cita = $request->input('hora_cita');
        $cita->description = $request->input('description');
        $cita->user_id = $request->input('user_id');
        $cita->user_id = $request->input('user_id');
        $fecha_cita = $request->input('fecha_cita');
        $hora_cita = $request->input('hora_cita');
        $existe_cita = Cita::where('fecha_cita', $fecha_cita)
                    ->where('hora_cita', $hora_cita)
                    ->exists();
        if ($existe_cita) {
            return redirect()->back()->with('error', 'Ya existe una cita programada para esta fecha y hora.');
        }else{
        $cita->save();
        $citas = Cita :: all();
        return view('citasview', compact('citas','users'))->with('success', 'La cita se ha creado exitosamente.');
        }
    }
    
    public function delete($id)
    {
        Cita::find($id)->delete();
        $citas = Cita :: all();
        $users = User :: all();
        return view('citasview', compact('citas','users'));    
    }
    public function edit($id)
    {
        $cita = Cita::find($id);
        $users = User::all();
        return view('editcitaview', compact('cita', 'users'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::find($id);
        $cita->Nombre_paciente = $request->nombre_paciente;
        $cita->fecha_solicitud = $request->fecha_solicitud;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->description = $request->description;
        $cita->user_id = $request->user_id;
        $cita->costo_cita = $request->costo_cita;
        $cita->status = $request->has('status');
        $cita->save();
        $citas = Cita :: all();
        $users = User :: all();
        return view('citasview', compact('citas','users'));
    }



}
