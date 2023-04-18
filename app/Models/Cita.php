<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    public function cita()
    {
        return $this->belongsToMany(Cita::class);
    }
   /* protected $fillable = [
        'nombre_paciente',
        'fecha',
        'descripcion',
        // otros campos de la tabla de citas
    ];*/
}
