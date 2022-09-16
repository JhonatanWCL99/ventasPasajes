<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_salida');
            $table->time('hora_salida');

            $table->char('estado');
            $table->decimal('precio_asiento',12,4);

            $table->unsignedBigInteger('chofer_id');
            $table->unsignedBigInteger('bus_id');
            $table->unsignedBigInteger('ruta_id');
            $table->foreign('chofer_id')->on('choferes')->references('id');
            $table->foreign('bus_id')->on('buses')->references('id');
            $table->foreign('ruta_id')->on('rutas')->references('id');
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
        Schema::dropIfExists('viajes');
    }
}
