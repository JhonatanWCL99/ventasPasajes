<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasPasajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_pasajes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_venta');
            $table->time('hora_venta');
            $table->decimal('total',18,4)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pasajero_id');

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('pasajero_id')->on('pasajeros')->references('id');

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
        Schema::dropIfExists('ventas_pasajes');
    }
}
