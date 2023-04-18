<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleMedicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicrol', function (Blueprint $table) {
            $table->id();
            $table->string('Area',60);
            $table->timestamps();
        });
        DB::table('medicrol')->insert([
            ['Area' => 'Medico General'],
            ['Area' => 'Oftalmologo'],
            ['Area' => 'Ginecologo'],
            ['Area' => 'Traumatologo']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicrol');
    }
   /* public function Rolmedic()
    {
        return $this->belongsTo(Rolmedic::class);
    }*/
}
