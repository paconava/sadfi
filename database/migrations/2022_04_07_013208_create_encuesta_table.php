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
            $table->unsignedBigInteger("division_id");
            $table->unsignedBigInteger("depto_id");
            $table->unsignedBigInteger("asig_id");
            $table->string("asignatura");
            $table->integer("grupo");
            $table->string("tipo");
            $table->string("curricular", 1);
            $table->string("rfc");
            $table->string("p1_a", 2);
            $table->string("p1_b", 2);
            $table->string("p1_c", 2);
            $table->string("p1_d", 2);
            $table->string("p1_e", 2);
            $table->string("p1_f", 2);
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
            $table->integer("p2_l_n");
            $table->integer("p3");
            $table->integer("p4_a");
            $table->integer("p4_b");
            $table->integer("p4_c");
            $table->integer("p4_d");
            $table->integer("p4_e");
            $table->integer("p4_f");
            $table->integer("p4_g");
            $table->integer("p4_h");
            $table->integer("p4_i");
            $table->text("p4_j")->nullable();
            $table->integer("p4_j_n");
            $table->integer("p5_a");
            $table->integer("p5_b");
            $table->integer("p5_c");
            $table->integer("p5_d");
            $table->integer("p5_e");
            $table->text("p5_f")->nullable();
            $table->integer("p5_f_n");
            $table->integer("p6_a");
            $table->integer("p6_b");
            $table->integer("p6_c");
            $table->integer("p6_d");
            $table->text("p6_e")->nullable();
            $table->integer("p6_e_n");
            $table->integer("p6_f");
            $table->integer("p7");
            $table->integer("p8");
            $table->integer("p10");
            $table->integer("p11")->nullable();
            $table->integer("p12");
            $table->integer("p13");
            $table->integer("p14");
            $table->text("p14_just")->nullable();
            $table->integer("p15");
            $table->text("p15_just")->nullable();
            $table->string("uno", 2);
            $table->string("dos", 2);
            $table->string("tres", 2);
            $table->string("cuatro", 2);
            $table->string("cinco", 2);
            $table->string("seis", 2);
            $table->string("siete", 2);
            $table->string("ocho", 2);
            $table->string("nueve", 2);
            $table->string("diez", 2);
            $table->integer("p17");
            $table->integer("p18");
            $table->integer("p19");
            $table->integer("p20_a");
            $table->integer("p20_b");
            $table->integer("p20_c");
            $table->integer("p20_d");
            $table->integer("p20_e");
            $table->integer("p20_otros")->nullable();
            $table->text("p20_f")->nullable();
            $table->text("p21")->nullable();


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
        Schema::dropIfExists('encuesta');
    }
}
