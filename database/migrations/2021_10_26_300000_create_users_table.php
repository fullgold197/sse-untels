<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 60);
            $table->string('email', 50)->unique();
            $table->string('password', 60);
            $table->tinyInteger('role_as')->default('0');
            $table->string('egresado_matricula', 10)->nullable();
            $table->string('dni', 8)->nullable();
            $table->foreign('dni')->references('dni')->on('egresado')->unique();
            $table->string('api_token')->unique()->nullable()->default(null);
            $table->rememberToken();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
