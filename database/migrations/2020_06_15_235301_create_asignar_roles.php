<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // unsigned asignar solo valores positivos
        Schema::create('asignar_roles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('roles_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignar_roles');
    }
}
