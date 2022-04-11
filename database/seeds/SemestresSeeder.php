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
        $this->crearSemestre('2021-1');
        $this->crearSemestre('2022-1');
    }

    public function crearSemestre($anio) {
        $semestre = new Semestre;
        $semestre->semestre = $anio;
        $semestre->save();
    }
}
