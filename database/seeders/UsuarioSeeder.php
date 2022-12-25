<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Egresado;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //Obteniendo el valor del campo matricula con la sentencia where usando el constructor de consultas sql
        /* $egresadoID=DB::table('egresado')
        ->where('matricula','2016200062')
        ->value('matricula'); */

        //Utilizando Eloquent, e interactuando con el modelo
        $egresadoID=Egresado::where('matricula','2016200062')
        ->value('matricula');
        $egresadoID2=Egresado::where('matricula','2016200241')
        ->value('matricula');
        $egresadoID3=Egresado::where('matricula','2016200186')
        ->value('matricula');
        $egresadoID4 = Egresado::where('matricula', '2016200092')
        ->value('matricula');
        $egresadoID5 = Egresado::where('matricula', '2016200216')
        ->value('matricula');

        $egresadoDNI = Egresado::where('dni', '71046461')
        ->value('dni');
        $egresadoDNI2 = Egresado::where('dni', '77072553')
        ->value('dni');
        $egresadoDNI3 = Egresado::where('dni', '71305640')
        ->value('dni');
        $egresadoDNI4 = Egresado::where('dni', '72700841')
        ->value('dni');
        $egresadoDNI5 = Egresado::where('dni', '73980032')
        ->value('dni');

        User::create(
        [
            'name' => 'Jean',
            'email' =>'cruzjean52@gmail.com',
            'password' => bcrypt('12345678'),
            'egresado_matricula'=> $egresadoID,
            'id_academico' => 1,
            'dni' => $egresadoDNI,
            'role_as' => '0',
            'estado' => '1',
            'estadocontrasena' => 'modificado'

        ]
        );
        User::create(
            [
                'name' => 'Oscar',
                'email' =>'oevr1997@gmail.com',
                'password' => bcrypt('12345678'),
                'egresado_matricula'=> $egresadoID2,
                'id_academico' => 1,
                'dni' => $egresadoDNI2,
                'role_as' => '0',
                'estado' => '1',
                'estadocontrasena' => 'modificado'

            ]
            );
        User::create(
            [
                'name' => 'Orlando',
                'email' =>'orlando@gmail.com',
                'password' => bcrypt('12345678'),
                'egresado_matricula'=> $egresadoID3,
                'id_academico' => 1,
                'dni' => $egresadoDNI3,
                'role_as' => '0',
                'estado' => '1',
                'estadocontrasena' => 'modificado'

            ]
            );
        User::create(
            [
                'name' => 'Elias',
                'email' => 'elias@gmail.com',
                'password' => bcrypt('12345678'),
                'egresado_matricula' => $egresadoID4,
                'id_academico' => 1,
                'dni' => $egresadoDNI4,
                'role_as' => '0',
                'estado' => '1',
                'estadocontrasena' => 'modificado'

            ]
        );
        User::create(
            [
                'name' => 'Nathan',
                'email' => 'nathan@gmail.com',
                'password' => bcrypt('12345678'),
                'egresado_matricula' => $egresadoID5,
                'id_academico' => 2,
                'dni' => $egresadoDNI5,
                'role_as' => '0',
                'estado' => '1',
                'estadocontrasena' => 'modificado'

            ]
        );
        User::create(
            [
                'name' => 'Erika',
                'email' => 'emanrique@untels.edu.pe',
                'password' => bcrypt('12345678'),
                'role_as' => '1',
                'estado' => '1',
                'estadocontrasena' => 'modificado',
                'id_academico' => 1,

            ]
        );
        User::create(
            [
                'name' => 'Igor',
                'email' => 'iaguilar@untels.edu.pe',
                'password' => bcrypt('12345678'),
                'role_as' => '1',
                'estado' => '1',
                'estadocontrasena' => 'modificado',
                'id_academico' => 2,

            ]
        );
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@untels.edu.pe',
                'password' => bcrypt('12345678'),
                'role_as' => '2',
                'estado' => '1',
                'estadocontrasena' => 'modificado',
                

            ]
        );

    }
}
