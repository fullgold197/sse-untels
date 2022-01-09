<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_profesion');
            $table->string('empresa', 100);
            $table->string('actividad_empresa', 100);
            $table->string('puesto', 100);
            $table->enum('nivel_experiencia', ['Junior', 'Senior']);
            $table->string('area_puesto', 100);
            $table->string('subarea', 100);
            $table->string('pais', 100);
            $table->date('fecha_inicio');
            $table->string('fecha_finalizacion');
            $table->string('descripcion_responsabilidades', 100);
            $table->string('sueldo')->nullable();
            $table->string('matricula',10)->nullable();
            /* $table->integer('id_egresado'); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('profesion');
        Schema::enableForeignKeyConstraints();

    }
}
