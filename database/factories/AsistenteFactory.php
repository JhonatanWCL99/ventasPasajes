<?php

namespace Database\Factories;

use App\Models\Asistente;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsistenteFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asistente::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $persona = Persona::all()->random();
        return [
            'cargo' =>  $this->faker->randomElement(['operador', 'atencion al cliente']),
            'persona_id'=> $persona->id,
        ];
    }
}
