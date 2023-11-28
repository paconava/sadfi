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
        $this->crearSemestre('20192');
        $this->crearSemestre('20201');
        $this->crearSemestre('20211');
        $this->crearSemestre('20221');
        $this->crearSemestre('20231');
        $this->crearSemestre('20232');
    }

    public function crearSemestre($anio) {
        $semestre = new Semestre;
        $semestre->semestre = $anio;
        $semestre->save();
    }
}
