<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tarifa;
use Database\Factories\TarifaFactory;
class TarifaSeeder extends Seeder
{
    public function run()
    {
        Tarifa::factory()->state([
            'titulo' => 'ReduccionSimple',
            'descripcion' => '20%',
            'costo' => 20
        ])->create();

        Tarifa::factory()->state([
            'titulo' => 'ReduccionPremium',
            'descripcion' => '30%',
            'costo' => 30
        ])->create();
    }
}
