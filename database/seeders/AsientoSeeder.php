<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asiento;
class AsientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asiento::create([
            'color' => 'Azul', /* Azul para libre -- Rojo para reservado */
            'estado' =>'L',  /* Libre /Reservado */
            'bus_id' => 1
        ]);
        Asiento::create([
            'color' => 'Azul', /* Azul para libre -- Rojo para reservado */
            'estado' =>'L',  /* Libre /Reservado */
            'bus_id' => 1
        ]);
        Asiento::create([
            'color' => 'Azul', /* Azul para libre -- Rojo para reservado */
            'estado' =>'L',  /* Libre /Reservado */
            'bus_id' => 1
        ]);
        Asiento::create([
            'color' => 'Azul', /* Azul para libre -- Rojo para reservado */
            'estado' =>'L',  /* Libre /Reservado */
            'bus_id' => 1
        ]);
        Asiento::create([
            'color' => 'Azul', /* Azul para libre -- Rojo para reservado */
            'estado' =>'L',  /* Libre /Reservado */
            'bus_id' => 1
        ]);
        Asiento::create([
            'color' => 'Azul', /* Azul para libre -- Rojo para reservado */
            'estado' =>'L',  /* Libre /Reservado */
            'bus_id' => 1
        ]);
        /* Bus_id = 2 */
        Asiento::create([
            'color' => 'Rojo', /* Azul para libre -- Rojo para reservado */
            'estado' =>'R',  /* Libre /Reservado */
            'bus_id' => 2,
        ]);
        Asiento::create([
            'color' => 'Azul', /* Azul para libre -- Rojo para reservado */
            'estado' =>'L',  /* Libre /Reservado */
            'bus_id' => 2,
        ]);
        Asiento::create([
            'color' => 'Azul', /* Azul para libre -- Rojo para reservado */
            'estado' =>'L',  /* Libre /Reservado */
            'bus_id' => 2,
        ]);
        Asiento::create([
            'color' => 'Rojo', /* Azul para libre -- Rojo para reservado */
            'estado' =>'R',  /* Libre /Reservado */
            'bus_id' => 2,
        ]);
    }
}
