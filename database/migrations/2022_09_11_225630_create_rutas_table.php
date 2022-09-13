<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->string('lugar_origen');
            $table->string('lugar_llegada');
            $table->unsignedBigInteger('viaje_id');
            $table->unsignedBigInteger('ciudad_id');

            $table->foreign('viaje_id')->on('viajes')->references('id');
            $table->foreign('ciudad_id')->on('ciudades')->references('id');
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
        Schema::dropIfExists('rutas');
    }
}
