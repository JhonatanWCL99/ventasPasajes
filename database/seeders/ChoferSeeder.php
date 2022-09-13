<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chofer;

class ChoferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chofer::factory(5)->create();
    }
}
