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
            $table->string('empresa', 50);
            $table->string('actividad_empresa', 50);
            $table->string('puesto', 50);
            $table->enum('nivel_experiencia', ['Junior', 'Senior']);
            $table->string('area_puesto', 50);
            $table->string('subarea', 50);
            $table->string('pais', 50);
            $table->date('fecha_inicio');
            $table->date('fecha_finalizacion');
            $table->string('descripcion_responsabilidades', 50);
            $table->string('matricula',10)->nullable();
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
