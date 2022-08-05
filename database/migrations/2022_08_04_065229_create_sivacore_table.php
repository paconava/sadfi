<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSivacoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sivacore', function (Blueprint $table) {
            $table->id();
            $table->integer('cuenta')->comment('Número de cuenta del alumno');
            $table->tinyInteger('edad')->nullable()->default(NULL);
            $table->string('registro',6)->nullable()->default(NULL);
            $table->string('carrera_alu',40)->nullable()->default(NULL);
            $table->smallInteger('p3')->nullable()->default(NULL)->comment('sexo (todas las generaciones) 1=mas, 2=fem');
            $table->smallInteger('p4')->nullable()->default(NULL)->comment('prim (todas las generaciones)');
            $table->smallInteger('p5')->nullable()->default(NULL)->comment('sec (todas las generaciones)');
            $table->smallInteger('p6')->nullable()->default(NULL)->comment('X_prim (todas las generaciones)');
            $table->smallInteger('p7')->nullable()->default(NULL)->comment('X_sec (todas las generaciones)');
            $table->smallInteger('p8')->nullable()->default(NULL)->comment('X_bach (todas las generaciones)');
            $table->smallInteger('p9')->nullable()->default(NULL)->comment('bach (todas las generaciones)');
            $table->smallInteger('p10')->nullable()->default(NULL)->comment('ENP (todas las generaciones)');
            $table->smallInteger('p11')->nullable()->default(NULL)->comment('CCH (todas las generaciones)');
            $table->smallInteger('p12')->nullable()->default(NULL)->comment('dur bach (todas las generaciones)');
            $table->smallInteger('p13')->nullable()->default(NULL)->comment('ingr_fi (todas las generaciones)');
            $table->smallInteger('p14')->nullable()->default(NULL)->comment('raz_elec (todas las generaciones)');
            $table->integer('p15')->nullable()->default(NULL);
            $table->integer('p16')->nullable()->default(NULL);
            $table->integer('p17')->nullable()->default(NULL);
            $table->integer('p23_1')->nullable()->default(NULL);
            $table->integer('p23_2')->nullable()->default(NULL);
            $table->integer('p23_3')->nullable()->default(NULL);
            $table->integer('p23_4')->nullable()->default(NULL);
            $table->integer('p23_5')->nullable()->default(NULL);
            $table->integer('p23_6')->nullable()->default(NULL);
            $table->integer('p23_7')->nullable()->default(NULL);
            $table->integer('p23_8')->nullable()->default(NULL);
            $table->integer('p23_9')->nullable()->default(NULL);
            $table->integer('p24')->nullable()->default(NULL);
            $table->integer('p25')->nullable()->default(NULL);
            $table->integer('p26')->nullable()->default(NULL);
            $table->integer('p27')->nullable()->default(NULL);
            $table->integer('p28')->nullable()->default(NULL);
            $table->integer('p29')->nullable()->default(NULL);
            $table->integer('p31')->nullable()->default(NULL);
            $table->integer('p32')->nullable()->default(NULL);
            $table->integer('p33')->nullable()->default(NULL);
            $table->integer('p34')->nullable()->default(NULL);
            $table->integer('p35')->nullable()->default(NULL);
            $table->integer('p36')->nullable()->default(NULL);
            $table->integer('p37')->nullable()->default(NULL);
            $table->integer('p38')->nullable()->default(NULL);
            $table->integer('p46_1')->nullable()->default(NULL);
            $table->integer('p46_2')->nullable()->default(NULL);
            $table->integer('p46_3')->nullable()->default(NULL);
            $table->integer('p46_4')->nullable()->default(NULL);
            $table->integer('p46_5')->nullable()->default(NULL);
            $table->integer('p46_6')->nullable()->default(NULL);
            $table->integer('p46_7')->nullable()->default(NULL);
            $table->integer('p46_8')->nullable()->default(NULL);
            $table->integer('p46_9')->nullable()->default(NULL);
            $table->integer('p46_10')->nullable()->default(NULL);
            $table->integer('p46_11')->nullable()->default(NULL);
            $table->integer('p46_12')->nullable()->default(NULL);
            $table->integer('p46_13')->nullable()->default(NULL);
            $table->integer('p46_14')->nullable()->default(NULL);
            $table->integer('p46_15')->nullable()->default(NULL);
            $table->integer('p46_16')->nullable()->default(NULL);
            $table->integer('p50')->nullable()->default(NULL);
            $table->integer('p51')->nullable()->default(NULL);
            $table->integer('p54')->nullable()->default(NULL);
            $table->integer('p55')->nullable()->default(NULL);
            $table->smallInteger('p56_1')->nullable()->default(NULL)->comment('leo de manera critica obteniendo conclusiones (2010-2011)');
            $table->smallInteger('p56_2')->nullable()->default(NULL)->comment('mantengo buenas relaciones con profs y compañeros (2010-2011)');
            $table->smallInteger('p56_3')->nullable()->default(NULL)->comment('falto a clases (2010-2011)');
            $table->smallInteger('p56_4')->nullable()->default(NULL)->comment('tomo apuntes en clase (2010-2011)');
            $table->smallInteger('p56_5')->nullable()->default(NULL)->comment('aspectos emocionales me impiden concentrarme (2010-2011)');
            $table->smallInteger('p56_6')->nullable()->default(NULL)->comment('copio a compañeros respuestas de ejercicios (2010-2011)');
            $table->smallInteger('p56_7')->nullable()->default(NULL)->comment('cuando estudio repito en voz alta lo mas relevante (2010-2011)');
            $table->smallInteger('p56_8')->nullable()->default(NULL)->comment('intento aprovechar al maximo mis estudios (2010-2011)');
            $table->smallInteger('p56_9')->nullable()->default(NULL)->comment('aprovecho horas libres entre clases (2010-2011)');
            $table->smallInteger('p56_10')->nullable()->default(NULL)->comment('al leer apuntes, distingo lo mas imp para estudiar (2010-2011)');
            $table->smallInteger('p56_11')->nullable()->default(NULL)->comment('me es dificil tomar decisiones respecto mis estudios (2010-2011)');
            $table->smallInteger('p56_12')->nullable()->default(NULL)->comment('al trabajar en equipo me distraigo en otros temas (2010-2011)');
            $table->smallInteger('p56_13')->nullable()->default(NULL);
            $table->smallInteger('p56_14')->nullable()->default(NULL)->comment('encuentro agradable ambiente en escuela (2010-2011)');
            $table->smallInteger('p56_15')->nullable()->default(NULL)->comment('estoy consciente del tiempo que debo dedicar al estudio (2010-2011)');
            $table->smallInteger('p56_16')->nullable()->default(NULL)->comment('pido prestados apuntes porque mios son malos (2010-2011)');
            $table->smallInteger('p56_17')->nullable()->default(NULL)->comment('me quedo con dudas por temor a preguntar al prof (2010-2011)');
            $table->smallInteger('p56_18')->nullable()->default(NULL)->comment('en la biblioteca en vez de estudiar me distraigo (2010-2011)');
            $table->smallInteger('p56_19')->nullable()->default(NULL)->comment('investigo por mi cuenta temas relacionados con las materias (2010-2011)');
            $table->smallInteger('p56_20')->nullable()->default(NULL)->comment('conforme avanzo me convenzo q hice buena elec profesional (2010-2011)');
            $table->smallInteger('p56_21')->nullable()->default(NULL)->comment('dejo para ultimo momento realizacion de tareas (2010-2011)');
            $table->integer('p56_22')->nullable()->default(NULL);
            $table->smallInteger('p56_23')->nullable()->default(NULL)->comment('mis profs tienen buena opinion de mi como estudiante (2010-2011)');
            $table->smallInteger('p56_24')->nullable()->default(NULL)->comment('en clase pregunto por la hora (2010-2011)');
            $table->smallInteger('p56_25')->nullable()->default(NULL)->comment('al estudiar en un libro, realizo los ejer sugeridos (2010-2011)');
            $table->smallInteger('p56_26')->nullable()->default(NULL)->comment('estoy convencido que me gusta escuela y estudiar (2010-2011)');
            $table->smallInteger('p56_27')->nullable()->default(NULL)->comment('tomo en cuenta todas materias al organizar mi tiempo (2010-2011)');
            $table->integer('p56_28')->nullable()->default(NULL);
            $table->smallInteger('p56_29')->nullable()->default(NULL)->comment('me desvelo estudiando para examenes (2010-2011)');
            $table->smallInteger('p56_30')->nullable()->default(NULL)->comment('donde estudio hay ruidos que me distraen (2010-2011)');
            $table->smallInteger('p56_31')->nullable()->default(NULL)->comment('estudio con suf anticipacion para examenes (2010-2011)');
            $table->smallInteger('p56_32')->nullable()->default(NULL)->comment('el trab que hare como profesional me parece inters y creativo (2010-2011)');
            $table->smallInteger('p56_33')->nullable()->default(NULL)->comment('planeo mis actividades escolares (2010-2011)');
            $table->integer('p56_34')->nullable()->default(NULL);
            $table->smallInteger('p56_35')->nullable()->default(NULL)->comment('para aclarar mis dudas pregunto al prof (2010-2011)');
            $table->smallInteger('p56_36')->nullable()->default(NULL)->comment('cuando estudio me distraigo facilmente con otras cosas (2010-2011)');
            $table->smallInteger('p56_37')->nullable()->default(NULL)->comment('practico lo aprendido (2010-2011)');
            $table->smallInteger('p56_38')->nullable()->default(NULL)->comment('en los examenes me preguntan temas q no revise (2010-2011)');
            $table->smallInteger('p56_39')->nullable()->default(NULL)->comment('a la hora d estudiar para examen lamento no tener apuntes (2010-2011)');
            $table->smallInteger('p56_40')->nullable()->default(NULL)->comment('entrego puntualmente trabajos y tareas (2010-2011)');
            $table->smallInteger('p56_41')->nullable()->default(NULL)->comment('me siento seguro de mis conocimientos antes de examen (2010-2011)');
            $table->smallInteger('p56_42')->nullable()->default(NULL)->comment('tengo presente horario para saber actividad planeada d tal hora (2010-2011)');
            $table->smallInteger('p56_43')->nullable()->default(NULL)->comment('realizo mas ejercicios de los que me asignan (2010-2011)');
            $table->smallInteger('p56_44')->nullable()->default(NULL)->comment('antes de estudiar me aseguro d tener todo a la mano (2010-2011)');
            $table->smallInteger('p56_45')->nullable()->default(NULL)->comment('me presento al primer dia de clases puntualmente (2010-2011)');
            $table->smallInteger('p56_46')->nullable()->default(NULL)->comment('escribo legible y ordenadamente mis resp en los examenes (2010-2011)');
            $table->smallInteger('p56_47')->nullable()->default(NULL)->comment('me siento frustrado como estudiante (2010-2011)');
            $table->smallInteger('p56_48')->nullable()->default(NULL)->comment('realizo con compañeros sesiones de estudio en equipo (2010-2011)');
            $table->smallInteger('p56_49')->nullable()->default(NULL)->comment('reviso apuntes oportunamente antes de entrar a clase (2010-2011)');
            $table->smallInteger('p56_50')->nullable()->default(NULL)->comment('me intereso por materias q llevo este semestre (2010-2011)');
            $table->smallInteger('p56_51')->nullable()->default(NULL)->comment('dedico sufic tiempo fuera d clase para estudiar materias (2010-2011)');
            $table->smallInteger('p56_52')->nullable()->default(NULL)->comment('al iniciar semestre defino objetivos escolares (2010-2011)');
            $table->smallInteger('p56_53')->nullable()->default(NULL)->comment('solo estudio cuando tengo presion de un examen (2010-2011)');
            $table->smallInteger('p56_54')->nullable()->default(NULL)->comment('el lugar donde estudio tiene objetos q me distraen (2010-2011)');
            $table->smallInteger('p56_55')->nullable()->default(NULL)->comment('para estudiar reviso libros adicionales a los q indica el prof (2010-2011)');
            $table->smallInteger('p56_56')->nullable()->default(NULL)->comment('considero q mis clases son interesantes (2010-2011)');
            $table->smallInteger('p56_57')->nullable()->default(NULL)->comment('siento q dia no me rinde para mis activ escolares (2010-2011)');
            $table->smallInteger('p56_58')->nullable()->default(NULL)->comment('contesto clara y precisamente las pregs de los examenes (2010-2011)');
            $table->smallInteger('p56_59')->nullable()->default(NULL)->comment('estudio solo para pasar los examenes (2010-2011)');
            $table->smallInteger('p56_60')->nullable()->default(NULL)->comment('escucho con atencion lo que dice el prof en clase (2010-2011)');
            $table->smallInteger('p56_61')->nullable()->default(NULL)->comment('cuando estudio, no hago caso a lo q ocurre alrededor (2010-2011)');
            $table->smallInteger('p56_62')->nullable()->default(NULL)->comment('copio esquemas ejem y anotaciones imp q hace el prof (2010-2011)');
            $table->smallInteger('p56_63')->nullable()->default(NULL)->comment('utilizo agenda y reloj para organizar mis actividades (2010-2011)');
            $table->smallInteger('p56_64')->nullable()->default(NULL)->comment('mis apuntes son breves y concisos (2010-2011)');
            $table->smallInteger('p56_65')->nullable()->default(NULL)->comment('mis compañeros tienen una buena opinion de mi como estudiante (2010-2011)');
            $table->smallInteger('p56_66')->nullable()->default(NULL)->comment('mi escritorio o lugar d estudio esta desorganizado (2010-2011)');
            $table->smallInteger('p56_67')->nullable()->default(NULL)->comment('en examen planeo una resp mentalmente antes d escribirla (2010-2011)');
            $table->smallInteger('p56_68')->nullable()->default(NULL)->comment('relaciono el tema estudiado con la vida diaria (2010-2011)');
            $table->smallInteger('p56_69')->nullable()->default(NULL)->comment('todos los dias anticipo y programo actividades a realizar (2010-2011)');
            $table->smallInteger('p56_70')->nullable()->default(NULL)->comment('consigo oportunamente libros y material solicitados por el prof (2010-2011)');
            $table->smallInteger('p56_71')->nullable()->default(NULL)->comment('participo en clase (2010-2011)');
            $table->smallInteger('p56_72')->nullable()->default(NULL)->comment('cuando estudio me concentro desde el principio (2010-2011)');
            $table->integer('p56_73')->nullable()->default(NULL);
            $table->smallInteger('p56_74')->nullable()->default(NULL)->comment('me agrada ayudar a estudiar a mis compañeros (2010-2011)');
            $table->smallInteger('p56_75')->nullable()->default(NULL)->comment('tengo presentes fechas de inicio y fin del semestre (2010-2011)');
            $table->smallInteger('p56_76')->nullable()->default(NULL)->comment('tengo un lugar organizado para guardar utiles escolares (2010-2011)');
            $table->smallInteger('p56_77')->nullable()->default(NULL)->comment('mi antipatia por un prof me impide aprender la materia (2010-2011)');
            $table->smallInteger('p56_78')->nullable()->default(NULL)->comment('mientras tomo notas pierdo puntos imp en la explicacion del prof (2010-2011)');
            $table->integer('p56_79')->nullable()->default(NULL);
            $table->smallInteger('p56_80')->nullable()->default(NULL)->comment('evito inscribirme con profs con fama de exigentes (2010-2011)');
            $table->smallInteger('p56_81')->nullable()->default(NULL)->comment('con anticip al examen reviso q tenga todo el material para estudiar (2010-2011)');
            $table->smallInteger('p56_82')->nullable()->default(NULL)->comment('al estudiar distingo el que como y por que de las cosas(2010-2011)');
            $table->smallInteger('p56_83')->nullable()->default(NULL)->comment('me pongo muy nervioso al presentar un examen (2010-2011)');
            $table->smallInteger('p56_84')->nullable()->default(NULL)->comment('en clase descubro facilmente ideas principales del tema (2010-2011)');
            $table->smallInteger('p56_85')->nullable()->default(NULL)->comment('cuando tomo notas hago tablas y cuadros para ser mas comprensible (2010-2011)');
            $table->smallInteger('p56_86')->nullable()->default(NULL)->comment('me gusta participar en activ escolares complementarias (2010-2011)');
            $table->smallInteger('p56_87')->nullable()->default(NULL)->comment('el tiempo me alcanza para estudiar y tener activ recreativas (2010-2011)');
            $table->smallInteger('p56_88')->nullable()->default(NULL)->comment('tengo cuaderno o carpeta para cada materia (2010-2011)');
            $table->smallInteger('p56_89')->nullable()->default(NULL)->comment('cuando tengo q estudiar me siento cansado y con sueño (2010-2011)');
            $table->smallInteger('p56_90')->nullable()->default(NULL)->comment('me concentro plenamente cuando estudio (2010-2011)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sivacore');
    }
}
