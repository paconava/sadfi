<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateP15Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p15', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primaryKey();
            $table->unsignedBigInteger("division_id");
            $table->unsignedBigInteger("depto_id");
            $table->string("asig_id");
            $table->integer("p15");
            $table->text("p15_just")->nullable();

            $table->foreign('division_id')->references('id')->on('divisiones');
            $table->foreign('depto_id')->references('id')->on('departamentos');
            //$table->foreign('asig_id')->references('id')->on('asignaturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p15');
    }
}
