<?php

namespace Database\Seeders;

use App\Models\Asistente;
use Illuminate\Database\Seeder;

class AsistenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asistente::factory(5)->create();
    }
}
