<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Egresado;

class EgresadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //constructor de consultas sql
        /* DB::table('egresado')->insert(
        [
            'matricula' =>'201520006123',
            'ap_paterno' => 'cabezas',
            'ap_materno'=>'lopez',
            'nombres' => 'Agusto',
            'genero'=> 'Masculino',
            'fecha_nacimiento' => '2021-12-28',
            'telefono'=>'12345678',
            'Provincia' => 'Lima',
            'Distrito' => 'Villa el salvador',
            'habilitado' => '1'
            ]
        ); */

//Utilizando Eloquent, interactuando con el modelo
        Egresado::create(
        [
                'matricula' => '2016200216',
                'ap_paterno' => 'Silvera',
                'ap_materno' => 'Iñigo',
                'nombres' => 'Nathan Josue',
                'grado_academico' => 'Bachiller',
                'dni' => '73980032',
                'genero' => 'Masculino',
                'fecha_nacimiento' => '1997-03-12',
                'semestre_ingreso' => '2016-2',
                'semestre_egreso' => '2021-1',
                'celular' => '931345654',
                'pais_origen' => 'Perú',
                'departamento_origen' => 'Lima',
                'pais_residencia' => 'Chile',
                'ciudad_residencia' => 'Santiago de Chile',
                'lugar_residencia' => 'Av. Ferreñape 390',
                'linkedin' => 'www.linkendin.com',
                'id_academico' => '1'

        ]
        );
        Egresado::create(
            [
                'matricula' =>'2016200241',
                'ap_paterno' => 'Vilca',
                'ap_materno'=>'Rivera',
                'nombres' => 'Oscar Ernesto',
                'grado_academico'=> 'Bachiller',
                'dni' => '77072553',
                'genero'=>'Masculino',
                'fecha_nacimiento' => '1997-09-01',
                'semestre_ingreso' => '2016-2',
                'semestre_egreso' => '2021-1',
                'celular' => '931193664',
                'pais_origen' => 'Perú',
                'departamento_origen' => 'Lima',
                'pais_residencia' => 'México',
                'ciudad_residencia' => 'Cuidad de México',
                'lugar_residencia' => 'Av. Guadalupe 344',
                'linkedin' => 'www.linkendin.com',
                'id_academico' => '1'

            ]
            );
            Egresado::create(
                [
                'matricula' => '2016200062',
                'ap_paterno' => 'Cruz',
                'ap_materno' => 'Huanca',
                'nombres' => 'Jean Carlos',
                'grado_academico' => 'Bachiller',
                'dni' => '71046461',
                'genero' => 'Masculino',
                'fecha_nacimiento' => '1996-02-17',
                'semestre_ingreso' => '2016-2',
                'semestre_egreso' => '2021-1',
                'celular' => '931193332',
                'pais_origen' => 'Perú',
                'departamento_origen' => 'Lima',
                'pais_residencia' => 'Colombia',
                'ciudad_residencia' => 'Cuidad de Colombia',
                'lugar_residencia' => 'Av. Guadalajara 788',
                'linkedin' => 'www.linkendin.com',
                'id_academico' => '1'
                ]
                );
                Egresado::create(
                    [
                'matricula' => '2016200186',
                'ap_paterno' => 'Ramos',
                'ap_materno' => 'Machuca',
                'nombres' => 'Jose Orlando',
                'grado_academico' => 'Bachiller',
                'dni' => '71305640',
                'genero' => 'Masculino',
                'fecha_nacimiento' => '1997-09-30',
                'semestre_ingreso' => '2016-2',
                'semestre_egreso' => '2021-1',
                'celular' => '931189544',
                'pais_origen' => 'Perú',
                'departamento_origen' => 'Lima',
                'pais_residencia' => 'Venezuela',
                'ciudad_residencia' => 'Caracas',
                'lugar_residencia' => 'Av. Chavez 728',
                'linkedin' => 'www.linkendin.com',
                'id_academico' => '1'
                    ]
                    );
                    Egresado::create(
                        [
                            'matricula' =>'2016200092',
                            'ap_paterno' => 'Gomez',
                            'ap_materno'=>'Florez',
                            'nombres' => 'Elias',
                            'grado_academico' => 'Bachiller',
                            'dni' => '72700841',
                            'genero' => 'Masculino',
                            'fecha_nacimiento' => '1999-02-25',
                            'semestre_ingreso' => '2016-2',
                            'semestre_egreso' => '2021-1',
                            'celular' => '931183456',
                            'pais_origen' => 'Perú',
                            'departamento_origen' => 'Lima',
                            'pais_residencia' => 'Cuba',
                            'ciudad_residencia' => 'La Habana',
                            'lugar_residencia' => 'Av. Habana 458',
                            'linkedin' => 'www.linkendin.com',
                            'id_academico' => '2'
                        ]
                        );

    }
}
