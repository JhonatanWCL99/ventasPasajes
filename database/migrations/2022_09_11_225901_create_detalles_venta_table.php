<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_venta', function (Blueprint $table) {
            $table->id();
            $table->decimal('cantidad',18,2);
            $table->decimal('subtotal',18,4);

            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('viaje_id');

            $table->foreign('venta_id')->on('ventas_pasajes')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('detalles_venta');
    }
}
