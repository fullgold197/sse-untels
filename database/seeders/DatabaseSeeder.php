<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();
        $this->truncatetables([
            'academico',
            'maestria',
            'doctorado',
            'egresado',
            'profesion',
            'users'
        ]);
        $this->call(AcademicoSeeder::class);


        $this->call(EgresadoSeeder::class); //invocar al seeder de egresados
        $this->call(DoctoradoSeeder::class);  //respetar el orden de las invocaciones sino habra error sql
        $this->call(MaestriaSeeder::class);
        $this->call(ProfesionSeeder::class);
        $this->call(UsuarioSeeder::class); //invocar al seeder de usuarios(tabla que depende de egresados mediante la llave foranea egresado_matricula)
    }

    function truncatetables(array $tables){

        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //deshabilitar la revision de claves foráneas
       /*  DB::table('egresado')->truncate(); */ //para vaciar las tablas antes de  volver a ejecutar los registros nuevamente

        foreach ($tables as $table){
            DB::table($table)->truncate(); //para vaciar las tablas antes de  volver a ejecutar los registros nuevamente

        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); //habilitar la revision de claves foráneas

    }

}

