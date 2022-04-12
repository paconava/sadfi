<?php

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->crearDepto(1, 1, "Coordinación de Ciencias Aplicadas");
        $this->crearDepto(2, 1, "Coordinación de Física y Química");
        $this->crearDepto(3, 1, "Coordinación de Matemáticas");
        $this->crearDepto(4, 4, "Departamento de Construcción");
        $this->crearDepto(5, 4, "Departamento de Estructuras");
        $this->crearDepto(6, 4, "Departamento de Fotogrametría");
        $this->crearDepto(7, 4, "Departamento de Geodesia y Cartografía");
        $this->crearDepto(8, 4, "Departamento de Geotecnia");
        $this->crearDepto(9, 5, "Departamento de Ingeniería de Control y Robótica");
        $this->crearDepto(10, 6, "Departamento de Ingeniería de Diseño y Manufactura");
        $this->crearDepto(11, 3, "Departamento de Ingeniería de Minas y Metalurgia");
        $this->crearDepto(12, 5, "Departamento de Ingeniería Electrónica");
        $this->crearDepto(13, 5, "Departamento de Ingeniería en Computación");
        $this->crearDepto(14, 5, "Departamento de Ingeniería en Energía Eléctrica");
        $this->crearDepto(15, 5, "Departamento de Ingeniería en Procesamiento de Señales");
        $this->crearDepto(16, 5, "Departamento de Ingeniería en Sistemas Energéticos");
        $this->crearDepto(17, 5, "Departamento de Ingeniería en Telecomunicaciones");
        $this->crearDepto(18, 3, "Departamento de Ingeniería Petrolera");
        $this->crearDepto(19, 4, "Departamento de Sanitaria y Ambiental");
        $this->crearDepto(20, 6, "Departamento de Sistemas Biomédicos");
        $this->crearDepto(21, 6, "Departamento de Termofluidos");
        $this->crearDepto(22, 4, "Departamento de Topografía");
        $this->crearDepto(23, 4, "Departamento de Hidráulica");
        $this->crearDepto(24, 4, "Departamento de Sistemas, Planeación y Transporte");
        $this->crearDepto(25, 3, "Departamento de Ingeniería Geofísica");
        $this->crearDepto(26, 3, "Departamento de Ingeniería Geológica");
        $this->crearDepto(27, 3, "Geología, Área de Yacimientos Minerales");
        $this->crearDepto(28, 3, "Geología, Área Geología del Petróleo y Geohidrología");
        $this->crearDepto(29, 2, "Departamento de Asignaturas Socio-humanísticas");
        $this->crearDepto(30, 6, "Departamento de Ingeniería Industrial");
        $this->crearDepto(31, 6, "Departamento de Ingeniería Mecatrónica");
        $this->crearDepto(32, 6, "Departamento de Ingeniería Aeroespacial");
    }

    public function crearDepto($id, $division_id, $nombre) {
        $depto = new Departamento;
        $depto->id = $id;
        $depto->division_id = $division_id;
        $depto->nombre = $nombre;
        $depto->save();
    }
}
