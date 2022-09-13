<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'genero' => $this->faker->randomElement(['masculino', 'femenino']),
            'nombre' => $this->faker->firstName() ,
            'apellido'=> $this->faker->lastName(),
            'ci' =>$this->faker->numberBetween(299116,11387268 ),
            'fecha_nacimiento'=> $this->faker->dateTimeBetween('1980-01-01', 'now') ,
            'direccion' => $this->faker->address,
        ];
    }
}
