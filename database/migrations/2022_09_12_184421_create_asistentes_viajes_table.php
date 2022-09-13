<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistentesViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistentes_viajes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('asistente_id');
            $table->unsignedBigInteger('viaje_id');

            $table->foreign('asistente_id')->on('asistentes')->references('id');
            $table->foreign('viaje_id')->on('viajes')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistentes_viajes');
    }
}
