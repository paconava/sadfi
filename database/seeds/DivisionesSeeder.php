<?php

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->crearDivision(1, "División de Ciencias Básicas","DCB");
        $this->crearDivision(2, "División de Ciencias Sociales y Humanidades","DCSYH");
        $this->crearDivision(3, "División de Ingeniería en Ciencias de la Tierra","DICT");
        $this->crearDivision(4, "División de Ingenierías Civil y Geomática","DICYG");
        $this->crearDivision(5, "División de Ingeniería Eléctrica","DIE");
        $this->crearDivision(6, "División de Ingeniería Mecánica e Industrial","DIMEI");
    }

    public function crearDivision($id, $nombre, $siglas) {
        $divison = new Division;
        $divison->id = $id;
        $divison->nombre = $nombre;
        $divison->siglas = $siglas;
        $divison->save();
    }
}
