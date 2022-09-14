<?php

namespace Database\Factories;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bus::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $marcas = ['Mercedes Benz','Chevrolet','Mustang','Iveco','Masserati'];
        $modelos = ['Auto 523 Hatchback 230','Vagoneta 522.',' Camioneta 211.','Coupé 65.','Utilitario 66.','Van 41.','Minibus 41'];
        $placas = ['hash73','73gsxw','735hgs','982jsg','hsg123'];
        return [
            'marca' => $this->faker->randomElement($marcas),
            'cantidad_max_asientos'=> $this->faker->numberBetween(20,30),
            'modelo'=> $this->faker->randomElement($modelos),
            'placa'=> $this->faker->randomElement($placas),
            'estado'=>'A', /* Activo */
        ];
    }
}
