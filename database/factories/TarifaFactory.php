<?php

namespace Database\Factories;

use App\Models\Tarifa;
use Illuminate\Database\Eloquent\Factories\Factory;

class TarifaFactory extends Factory
{
    protected $model = Tarifa::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->randomElement(['ReduccionSimple', 'ReduccionPremium']),
            'descripcion' => $this->faker->randomElement(['20%', '30%']),
            'costo' => $this->faker->randomElement([20, 30])
        ];
    }
}
