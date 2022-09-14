<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruta;

class RutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ruta::create([
            'lugar_origen' => 'La Paz',
            'lugar_llegada' => 'Santa Cruz',
            'ciudad_id' => 1,
        ]);

        Ruta::create([
            'lugar_origen' => 'Pocitos Argentinos',
            'lugar_llegada' => 'Angostura',
            'ciudad_id' => 2,
        ]);
        Ruta::create([
            'lugar_origen' => 'La Quebrada',
            'lugar_llegada' => 'Angostura',
            'ciudad_id' => 2,
        ]);
        Ruta::create([
            'lugar_origen' => 'Samaipata',
            'lugar_llegada' => 'El Alto',
            'ciudad_id' => 3,
        ]);
    }
}
