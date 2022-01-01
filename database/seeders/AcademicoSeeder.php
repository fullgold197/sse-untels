<?php

namespace Database\Seeders;

use App\Models\Academico;
use Illuminate\Database\Seeder;

class AcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$egresado = new Academico();
        //$egresado->carr_profesional = 'Ingeniería de Sistemas';
        /* $egresado->grado_academico = 'Maestro';
        $egresado->pais = 'Perú';
        $egresado->tipo_estudio = 'Postgrado';
        $egresado->institución = 'Untels';
        $egresado->fecha_inicial = '2016-08-01';
        $egresado->fecha_final = '2016-08-01'; */
        //$egresado->save();

       // $egresado1 = new Academico();
        //$egresado1->carr_profesional = 'Ingeniería de Sistemas';
        /* $egresado1->grado_academico = 'Bachiller';
        $egresado1->pais = 'Perú';
        $egresado1->tipo_estudio = 'Pregrado';
        $egresado1->institución = 'Untels';
        $egresado1->fecha_inicial = '2016-08-01';
        $egresado1->fecha_final = '2016-08-01'; */
        //$egresado1->save();

        Academico::create(
            [
                'carr_profesional' =>'Ingeniería de sistemas',
            ]
            );
        Academico::create(
            [
                'carr_profesional' => 'Ingeniería Electrónica y Telecomunicaciones',
            ]
        );
        Academico::create(
            [
                'carr_profesional' => 'Ingeniería Ambiental',
            ]
        );
        Academico::create(
            [
                'carr_profesional' => 'Ingeniería Mecánica y Eléctrica',
            ]
        );
        Academico::create(
            [
                'carr_profesional' => 'Administración de Empresas',
            ]
        );

    }
}
