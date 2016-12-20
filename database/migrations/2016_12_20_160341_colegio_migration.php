<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ColegioMigration extends Migration
{
    public function up()
    {
        Schema::create('colegio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->string('latitud');
            $table->string('longitud');
            $table->nullableTimestamps();
        });
    }

    public function down()
    {
        Schema::drop('colegio');
    }
}
