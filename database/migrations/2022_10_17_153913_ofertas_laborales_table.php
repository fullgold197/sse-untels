<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('of_laborales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_of_laborales');
            $table->string('imagen');
            $table->string('nombre', 50);
            $table->string('url');
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
        Schema::dropIfExists('of_laborales');
        Schema::enableForeignKeyConstraints();
    }
};
