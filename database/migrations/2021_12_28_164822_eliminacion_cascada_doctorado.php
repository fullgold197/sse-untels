<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminacionCascadaDoctorado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('doctorado', function (Blueprint $table) {

            $table->foreign('matricula')->references('matricula')->on('egresado')->onDelete('cascade')->onUpdate('cascade')->after('fecha_final');
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

            /*  $table->dropColumn('doctorado'); */
            Schema::disableForeignKeyConstraints();
           /*  $table->dropForeign('matricula'); */
            /* $table->dropColumn('matricula'); */

            Schema::enableForeignKeyConstraints();
        });
    }
}
