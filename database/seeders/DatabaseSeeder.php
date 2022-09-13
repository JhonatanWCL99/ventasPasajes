<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PersonaSeeder;
use Database\Seeders\AsistenteSeeder;
use Database\Seeders\ChoferSeeder;
use Database\Seeders\PasajeroSeeder;

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
    }
}
