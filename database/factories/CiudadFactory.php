<?php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class CiudadFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ciudad::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ciudades =['Sucre', 'Santa Cruz','Cochabamba','La Paz','El Alto','Tarija','Oruro','Beni San Borja','Pando','Angostura'];
        return [
            'nombre'=> $this->faker->randomElement($ciudades),

        ];
    }
}
