<?php

use Illuminate\Database\Seeder;
use App\Models\Semestre;

class SemestresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->crearSemestre('20211');
        $this->crearSemestre('20221');
    }

    public function crearSemestre($anio) {
        $semestre = new Semestre;
        $semestre->semestre = $anio;
        $semestre->save();
    }
}
