<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $cita) {
            $cita->id();
            $cita->string('Nombre_paciente', 50);
            $cita->string('fecha_solicitud', 50);
            $cita->string('fecha_cita', 50);
            $cita->time('hora_cita');
            $cita->string('description');
            if (Schema::hasTable('users')) {
                $cita->foreignId('user_id')->constrained()->where('role_id', 2);
            }
            $cita->boolean('status')->default(0);
            $cita->decimal('costo_cita', 8, 2)->nullable();
            $cita->timestamps();

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
