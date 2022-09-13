<?php

namespace Database\Factories;

use App\Models\Pasajero;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasajeroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pasajero::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $persona = Persona::all()->random();
        return [
            'persona_id' => $persona->id,
        ];
    }
}
