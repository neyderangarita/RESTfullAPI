<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComentarioMigration extends Migration
{

    public function up()
    {
        Schema::create('comentario', function (Blueprint $table) {
            $table->increments('id');        
            $table->integer('colegio_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('calificacion');
            $table->string('mensaje');
            $table->nullableTimestamps();
        });
    }

    public function down()
    {
        Schema::drop('comentario');
    }
}
