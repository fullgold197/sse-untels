<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EgresadoProfesionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Schema::create('egresado_profesion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('matricula',10); */
            /* $table->foreign('matricula')->references('matricula')->on('egresado'); */
           /*  $table->integer('id_profesion',10);
            $table->foreign('id_profesion')->references('id_profesion')->on('profesion');
        }); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /*  Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('egresado_profesion');
        Schema::enableForeignKeyConstraints(); */
    }
}
