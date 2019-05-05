<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldMovieCoverPageToConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config', function (Blueprint $table) {
            $table->string("nombre_pelicula_portada",100);
            $table->string("censura_pelicula_portada",30);
            $table->string("director_pelicula_portada",70);
            $table->string("calificacion_pelicula_portada",20);
            $table->string("fecha_genero_pelicula_portada",100);
            $table->string("resena_pelicula_portada",500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config', function (Blueprint $table) {
            //
        });
    }
}
