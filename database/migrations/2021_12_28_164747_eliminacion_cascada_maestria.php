<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminacionCascadaMaestria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('maestria', function (Blueprint $table) {

           /*  $table->foreign('matricula')->references('matricula')->on('Egresado')->after('descripcion_responsabilidades'); */

            $table->foreign('matricula')->references('matricula')->on('egresado')->after('fecha_final');
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
        Schema::table('egresado', function (Blueprint $table) {

            $table->dropColumn('maestria');
            Schema::disableForeignKeyConstraints();
            Schema::enableForeignKeyConstraints();
        });
    }
}
