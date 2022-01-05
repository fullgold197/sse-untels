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

        $this->call(AcademicoSeeder::class);


        $this->call(EgresadoSeeder::class); //invocar al seeder de egresados
        $this->call(DoctoradoSeeder::class);  //respetar el orden de las invocaciones sino habra error sql
        $this->call(MaestriaSeeder::class);
        $this->call(ProfesionSeeder::class);
        $this->call(UsuarioSeeder::class); //invocar al seeder de usuarios(tabla que depende de egresados mediante la llave foranea egresado_matricula)
        $this->call(PorcentajeSeeder::class);
        $this->call(PorcentajeDoctoradoSeeder::class);
    }



}

