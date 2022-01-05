<?php

namespace Database\Seeders;

use App\Models\PorcentajeDoctorado;
use Illuminate\Database\Seeder;

class PorcentajeDoctoradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PorcentajeDoctorado::create(
            [
                'nombre' => 'Doctorado',
                'porcentaje' => '20.9',

            ]
        );
        PorcentajeDoctorado::create(
            [
                'nombre' => 'Sin doctorado',
                'porcentaje' => '79.1',

            ]
        );
    }
}
