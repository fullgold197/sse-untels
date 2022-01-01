<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminacionCascada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function (Blueprint $table){

    $table->foreign('egresado_matricula')->references('matricula')->on('egresado')->onDelete('cascade')->after('egresado_matricula');
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

        $table->dropColumn('users');
        Schema::disableForeignKeyConstraints();
        Schema::enableForeignKeyConstraints();

        });

    }
}
