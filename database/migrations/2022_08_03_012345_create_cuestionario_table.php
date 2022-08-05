<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuestionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_sociodemografico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('es_pregunta');
            $table->boolean('es_respuesta');
            $table->integer('valor');
            $table->text('texto');
            $table->integer('id_padre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_sociodemografico');
    }
}
