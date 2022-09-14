<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PersonaSeeder;
use Database\Seeders\AsistenteSeeder;
use Database\Seeders\ChoferSeeder;
use Database\Seeders\PasajeroSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AsientoSeeder;
use Database\Seeders\BusSeeder;
use Database\Seeders\CiudadSeeder;
use Database\Seeders\RutaSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PersonaSeeder::class);
        $this->call(AsistenteSeeder::class);
        $this->call(ChoferSeeder::class);
        $this->call(PasajeroSeeder::class);

        $this->call(CiudadSeeder::class);
        $this->call(BusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AsientoSeeder::class);
        $this->call(RutaSeeder::class);
    }
}
