<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/* DB::statement('SET SESSION sql_require_primary_key=0'); */
class CreateEgresadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresado', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('matricula', 10)->primary()->unique()->onDelete('cascade')->onUpdate('cascade');
            $table->string('ap_paterno', 50);
            $table->string('ap_materno', 50);
            $table->string('nombres', 100);
            $table->string('grado_academico')->default('Bachiller');
            $table->string('dni', 8)->unique();
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->date('fecha_nacimiento');
            $table->string('año_ingreso', 4)->nullable();
            $table->string('semestre_ingreso', 1)->nullable();
            $table->string('año_egreso', 4)->nullable();
            $table->string('semestre_egreso', 1)->nullable();
            $table->string('celular', 9)->nullable();
            $table->string('pais_origen', 50)->nullable();
            $table->string('departamento_origen', 200)->nullable();
            $table->string('pais_residencia', 50)->nullable();
            $table->string('ciudad_residencia', 50)->nullable();
            $table->string('lugar_residencia', 100)->nullable();
            $table->integer('cant_maestrias')->nullable()->default(0);
            $table->integer('cant_doctorados')->nullable()->default(0);
            $table->string('linkedin', 100)->nullable();
            $table->string('url')->nullable();
            $table->boolean('habilitado')->default('0');
            $table->integer('id_academico')->unsigned()->default('1');
            $table->foreign('id_academico')->references('id_academico')->on('academico')->onUpdate('cascade')->unique();
            /* $table->integer('id_egresado_profesion')->unsigned()->nullable(); */

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
        Schema::dropIfExists('egresado');
        Schema::enableForeignKeyConstraints();
    }
}
