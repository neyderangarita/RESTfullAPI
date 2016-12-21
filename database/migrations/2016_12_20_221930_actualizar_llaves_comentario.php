<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActualizarLlavesComentario extends Migration
{

    public function up()
    {
        Schema::table('comentario', function (Blueprint $table) {

            $table->foreign('colegio_id')
                ->references('id')->on('colegio')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
    }
}
