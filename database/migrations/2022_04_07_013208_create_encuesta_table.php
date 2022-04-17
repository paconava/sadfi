<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semestre', 5);
            $table->string("division");
            $table->string("depto");
            $table->unsignedBigInteger("asig_id");
            $table->string("asignatura");
            $table->integer("grupo");
            $table->string("tipo")->nullable();
            $table->string("curricular");
            $table->string("rfc")->nullable();
            $table->string("p1_a", 2);
            $table->string("p1_b", 2);
            $table->string("p1_c", 2);
            $table->string("p1_d", 2);
            $table->string("p1_e", 2);
            $table->string("p1_f", 2)->nullable();
            $table->integer("p2_a");
            $table->integer("p2_c");
            $table->integer("p2_d");
            $table->integer("p2_e");
            $table->integer("p2_f");
            $table->integer("p2_g");
            $table->integer("p2_h");
            $table->integer("p2_i");
            $table->integer("p2_j");
            $table->integer("p2_k");
            $table->text("p2_l")->nullable();
            $table->integer("p2_l_n")->nullable();
            $table->integer("p3")->nullable();
            $table->integer("p4_a")->nullable();
            $table->integer("p4_b")->nullable();
            $table->integer("p4_c")->nullable();
            $table->integer("p4_d")->nullable();
            $table->integer("p4_e")->nullable();
            $table->integer("p4_f")->nullable();
            $table->integer("p4_g")->nullable();
            $table->integer("p4_h")->nullable();
            $table->integer("p4_i")->nullable();
            $table->text("p4_j")->nullable();
            $table->integer("p4_j_n")->nullable();
            $table->integer("p5_a")->nullable();
            $table->integer("p5_b")->nullable();
            $table->integer("p5_c")->nullable();
            $table->integer("p5_d")->nullable();
            $table->integer("p5_e")->nullable();
            $table->text("p5_f")->nullable();
            $table->integer("p5_f_n")->nullable();
            $table->integer("p6_a")->nullable();
            $table->integer("p6_b")->nullable();
            $table->integer("p6_c")->nullable();
            $table->integer("p6_d")->nullable();
            $table->text("p6_e")->nullable();
            $table->integer("p6_e_n")->nullable();
            $table->integer("p6_f")->nullable();
            $table->integer("p7");
            $table->integer("p8");
            $table->integer("p9")->nullable();
            $table->text("p9_just")->nullable();
            $table->integer("p10");
            $table->text("p10_just")->nullable();
            $table->integer("p11")->nullable();
            $table->integer("p12");
            $table->integer("p13");
            $table->integer("p14");
            $table->text("p14_just")->nullable();
            $table->integer("p15");
            $table->text("p15_just")->nullable();
            $table->integer("p15_a")->nullable();
            $table->integer("p15_b")->nullable();
            $table->integer("p15_c")->nullable();
            $table->integer("p15_d")->nullable();
            $table->integer("p15_e")->nullable();
            $table->string("uno", 2)->nullable();
            $table->string("dos", 2)->nullable();
            $table->string("tres", 2)->nullable();
            $table->string("cuatro", 2)->nullable();
            $table->string("cinco", 2)->nullable();
            $table->string("seis", 2)->nullable();
            $table->string("siete", 2)->nullable();
            $table->string("ocho", 2)->nullable();
            $table->string("nueve", 2)->nullable();
            $table->string("diez", 2)->nullable();
            $table->integer("p17")->nullable();
            $table->integer("p18")->nullable();
            $table->integer("p19")->nullable();
            $table->integer("p20_a")->nullable();
            $table->integer("p20_b")->nullable();
            $table->integer("p20_c")->nullable();
            $table->integer("p20_d")->nullable();
            $table->integer("p20_e")->nullable();
            $table->integer("p20_otros")->nullable();
            $table->text("p20_f")->nullable();
            $table->text("p21")->nullable();


            // $table->foreign('division')->references('siglas')->on('divisiones');
            // $table->foreign('depto')->references('nombre')->on('departamentos');
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
        Schema::dropIfExists('encuesta');
    }
}
