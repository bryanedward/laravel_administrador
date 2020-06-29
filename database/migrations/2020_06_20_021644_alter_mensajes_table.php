<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensajes', function (Blueprint $table) {
            // alterar la tabla mensaje
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensajes', function (Blueprint $table) {
            //eliminar la columna alterada de la columna agregada 
            // de la tabla mensaje
            $table->dropColumn('user_id');
        });
    }
}
