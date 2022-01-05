<?php

namespace Database\Seeders;

use App\Models\Porcentaje;
use Illuminate\Database\Seeder;

class PorcentajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Porcentaje::create(
            [
                'nombre' => 'Maestria',
                'porcentaje' => '30.9',

            ]
        );
        Porcentaje::create(
            [
                'nombre' => 'Sin maestria',
                'porcentaje' => '69.1',

            ]
        );
    }
}
