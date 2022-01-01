<?php

namespace Database\Seeders;

use App\Models\Doctorado;
use Illuminate\Database\Seeder;

class DoctoradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*  $egresado = new Doctorado();
        $egresado->grado_academico = 'Doctor';
        $egresado->pais = 'Colombia';
        $egresado->institución = 'Universidad Nacional de Colombia';
        $egresado->fecha_inicial = '2024-05-01';
        $egresado->fecha_final = '2025-05-01';
        $egresado->id_academico  = '1';
        $egresado->save();

        $egresado1 = new Doctorado();
        $egresado1->grado_academico = 'Doctor';
        $egresado1->pais = 'Chile';
        $egresado1->institución = 'Universidad de Chile';
        $egresado1->fecha_inicial = '2025-05-01';
        $egresado1->fecha_final = '2025-05-01';
        $egresado1->id_academico  = '2';
        $egresado1->save();
 */
        Doctorado::create(
        [
            'grado_academico' =>'Doctor',
            'pais' => 'Colombia',
            'institución'=>'Universidad Nacional de Colombia',
            'fecha_inicial' => '2024-05-01',
            'fecha_final'=> '2025-05-01',
            'matricula' => '2016200241',
        ]
        );

        Doctorado::create(
            [
                'grado_academico' =>'Doctor',
                'pais' => 'Chile',
                'institución'=>'Universidad Nacional de Chile',
                'fecha_inicial' => '2024-05-01',
                'fecha_final'=> '2025-05-01',
                'matricula' => '2016200062',
            ]
            );
    }
}
