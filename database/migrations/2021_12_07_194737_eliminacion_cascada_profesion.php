<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminacionCascadaProfesion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('profesion',function (Blueprint $table){

        $table->foreign('matricula')->references('matricula')->on('egresado')->onDelete('cascade')->onUpdate('cascade')->after('descripcion_responsabilidades');
     });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('egresado',function (Blueprint $table){

            /* $table->dropColumn('profesion'); */
            Schema::disableForeignKeyConstraints();
            Schema::enableForeignKeyConstraints();
        });

    }
}
