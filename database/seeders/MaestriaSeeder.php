<?php

namespace Database\Seeders;

use App\Models\Maestria;
use Illuminate\Database\Seeder;

class MaestriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $egresado = new Maestria();
        $egresado->grado_academico = 'Maestro';
        $egresado->pais = 'Peru';
        $egresado->institución = 'UNMSM';
        $egresado->fecha_inicial = '2022-07-01';
        $egresado->fecha_final = '2023-07-01';
        $egresado->id_academico  = '1';
        $egresado->save();

        $egresado1 = new Maestria();
        $egresado1->grado_academico = 'Maestro';
        $egresado1->pais = 'Peru';
        $egresado1->institución = 'UNI';
        $egresado1->fecha_inicial = '2022-05-01';
        $egresado1->fecha_final = '2023-05-01';
        $egresado1->id_academico  = '2';
        $egresado1->save();
         */
 //Oscar
        Maestria::create(
            [
                'grado_academico' =>'Maestro',
                'pais' => 'Peru',
                'institución'=>'UNMSM',
                'fecha_inicial' => '2022-07-01',
                'fecha_final'=> '2023-07-01',
                'matricula' => '2016200241',


            ]
            );
      Maestria::create(
            [
                'grado_academico' =>'Maestro',
                'pais' => 'Peru',
                'institución'=>'UNI',
                'fecha_inicial' => '2022-05-01',
                'fecha_final'=> '2023-05-01',
                'matricula' => '2016200241',

            ]
            );
    //Nathan
        Maestria::create(
            [
                'grado_academico' => 'Maestro',
                'pais' => 'Chile',
                'institución' => 'Universidad de Chile',
                'fecha_inicial' => '2022-07-01',
                'fecha_final' => '2023-07-01',
                'matricula' => '2016200216',
            ]
        );
        Maestria::create(
            [
                'grado_academico' => 'Maestro',
                'pais' => 'EE.UU.',
                'institución' => 'Universidad de Harvard',
                'fecha_inicial' => '2022-05-01',
                'fecha_final' => '2023-05-01',
                'matricula' => '2016200216',

            ]
        );
        //Jean Carlos
        Maestria::create(
            [
                'grado_academico' => 'Maestro',
                'pais' => 'Colombia',
                'institución' => 'Universidad de Colombia',
                'fecha_inicial' => '2022-07-01',
                'fecha_final' => '2023-07-01',
                'matricula' => '2016200062',


            ]
        );
        Maestria::create(
            [
                'grado_academico' => 'Maestro',
                'pais' => 'Ecuador',
                'institución' => 'Universidad de Ecuador',
                'fecha_inicial' => '2022-05-01',
                'fecha_final' => '2023-05-01',
                'matricula' => '2016200062',

            ]
        );

        //Jose Orlando
        Maestria::create(
            [
                'grado_academico' => 'Maestro',
                'pais' => 'Cuba',
                'institución' => 'Universidad de Cuba',
                'fecha_inicial' => '2022-07-01',
                'fecha_final' => '2023-07-01',
                'matricula' => '2016200186',


            ]
        );
        Maestria::create(
            [
                'grado_academico' => 'Maestro',
                'pais' => 'Uruguay',
                'institución' => 'Universidad de Uruguay',
                'fecha_inicial' => '2022-05-01',
                'fecha_final' => '2023-05-01',
                'matricula' => '2016200186',

            ]
        );
        //Elias
        Maestria::create(
            [
                'grado_academico' => 'Maestro',
                'pais' => 'Perú',
                'institución' => 'Universidad Alas Peruanas',
                'fecha_inicial' => '2022-07-01',
                'fecha_final' => '2023-07-01',
                'matricula' => '2016200092',


            ]
        );
        Maestria::create(
            [
                'grado_academico' => 'Maestro',
                'pais' => 'Perú',
                'institución' => 'Untels',
                'fecha_inicial' => '2022-07-01',
                'fecha_final' => '2023-07-01',
                'matricula' => '2016200092',

            ]
        );


    }
}
