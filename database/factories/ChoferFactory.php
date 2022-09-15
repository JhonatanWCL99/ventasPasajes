<?php

namespace Database\Factories;

use App\Models\Chofer;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChoferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chofer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $persona = Persona::all()->random();
        return [
            'licencia_conducir' =>$this->faker->numberBetween(20000,30000 ),
            'fecha_caducidad'=>$this->faker->dateTimeBetween('2021-01-01', 'now'),
            'estado' => 'O' ,/* Disponible - Ocupado */
            'persona_id' => $persona->id
        ];
    }
}
