<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuestionario;
use DB;
use Exception;

class SadfiController extends Controller {

    public function sivacore() {
        return view('sivacore');
    }

    public function postGen(Request $request) {
        $validatedData = $request->validate([
            'generacion' => 'required'
        ],['generacion.required' => 'Debes elegir una generación']);
        $gen = $validatedData['generacion'];
        $cuestionario = Cuestionario::get();
        $datos_gen = DB::table('sivacore')->where('registro', $gen)->get();
        $total = $datos_gen->count();

        // A. Datos generales
        $hombres = $datos_gen->where('p3', 1)->count();
        $mujeres = $total - $hombres;
        $porcentaje_hombres = round($hombres * 100 / $total, 1);
        $porcentaje_mujeres = round($mujeres * 100 / $total, 1);
        
        // B. Perfil Escolar
        $pase_reglamentado = $datos_gen->whereIn('p13', [1,2,3])->count();
        $concurso = $datos_gen->whereIn('p13', [4,5,6,7])->count();
        $porcentaje_pase_reglamentado = round($pase_reglamentado * 100 / ($pase_reglamentado + $concurso),1);
        $porcentaje_concurso = round($concurso * 100 / ($pase_reglamentado + $concurso),1);

        // Tabla 1 (bachillerato de procedencia)
        $bach_pregunta = $cuestionario->where('es_pregunta', 1)->where('valor', 9)->first();
        $bach_opciones = $cuestionario->where('id_padre', $bach_pregunta['id']);
        $porcentaje_bach_unam = 0;
        foreach($bach_opciones as $key => $value) {
            $bach_opciones[$key]->total = $datos_gen->where('p9', $bach_opciones[$key]->valor)->count();
            $bach_opciones[$key]->porcentaje = round($bach_opciones[$key]->total * 100 / $total,1);
            if(in_array($bach_opciones[$key]->valor,[1,2])) 
                $porcentaje_bach_unam += $bach_opciones[$key]->porcentaje;
        }
        // Tabla 2 (Promedio de calificaciones en el bachillerato)
        $calif_bach_pregunta = $cuestionario->where('es_pregunta', 1)->where('valor', 8)->first();
        $calif_bach_opciones = $cuestionario->where('id_padre', $calif_bach_pregunta['id']);
        $calif_bach_moda = "";
        $calif_bach_moda_val = 0;
        foreach($calif_bach_opciones as $key => $value) {
            $calif_bach_opciones[$key]->total = $datos_gen->where('p8', $calif_bach_opciones[$key]->valor)->count();
            if($calif_bach_opciones[$key]->total > $calif_bach_moda_val) {
                $calif_bach_moda_val = $calif_bach_opciones[$key]->total;
                $calif_bach_moda = strtolower($calif_bach_opciones[$key]->texto);
            }
            $calif_bach_opciones[$key]->porcentaje = round($calif_bach_opciones[$key]->total * 100 / $total,1);
        }
        $a_tiempo = round($datos_gen->whereIn('p12', [1,2])->count() * 100 / $total,1);

        // Razones ingeniería
        $razon_ingenieria_pregunta = $cuestionario->where('es_pregunta', 1)->where('valor', 14)->first();
        $razon_ingenieria_opciones = $cuestionario->where('id_padre', $razon_ingenieria_pregunta['id']);
        $razones = [];
        foreach($razon_ingenieria_opciones as $key => $value) {
            $razon_ingenieria_opciones[$key]->total = $datos_gen->where('p14', $razon_ingenieria_opciones[$key]->valor)->count();
            $razon_ingenieria_opciones[$key]->porcentaje = round($razon_ingenieria_opciones[$key]->total * 100 / $total,1);
            $razones[strtolower($razon_ingenieria_opciones[$key]->texto)] = $razon_ingenieria_opciones[$key]->porcentaje;
        }
        arsort($razones);

        // Razones UNAM
        $razon_unam_pregunta = $cuestionario->where('es_pregunta', 1)->where('valor', 15)->first();
        $razon_unam_opciones = $cuestionario->where('id_padre', $razon_unam_pregunta['id']);
        $razones_unam = [];
        foreach($razon_unam_opciones as $key => $value) {
            $razon_unam_opciones[$key]->total = $datos_gen->where('p15', $razon_unam_opciones[$key]->valor)->count();
            $razon_unam_opciones[$key]->porcentaje = round($razon_unam_opciones[$key]->total * 100 / $total,1);
            $razones_unam[strtolower($razon_unam_opciones[$key]->texto)] = $razon_unam_opciones[$key]->porcentaje;
        }
        arsort($razones_unam);

        // Posgrado extranjero
        $posgrado_ext = round($datos_gen->where('p16', 5)->count() * 100 / $total,1);
        // Perspectiva de empleo
        $perspectiva = round($datos_gen->whereIn('p17', [1,2])->count() * 100 / $total,1);

        // C. Datos socioeconomicos
        $padres_juntos = round($datos_gen->where('p24', 1)->count() * 100 / $total,1);
        $hermanos = round($datos_gen->whereIn('p25', [2,3])->count() * 100 / $total,1);
        // Estudios padre
        $estudios_padre_pregunta = $cuestionario->where('es_pregunta', 1)->where('valor', 26)->first();
        $estudios_padre_opciones = $cuestionario->where('id_padre', $estudios_padre_pregunta['id']);
        $estudios_padre = [];
        foreach($estudios_padre_opciones as $key => $value) {
            $estudios_padre_opciones[$key]->total = $datos_gen->where('p26', $estudios_padre_opciones[$key]->valor)->count();
            $estudios_padre_opciones[$key]->porcentaje = round($estudios_padre_opciones[$key]->total * 100 / $total,1);
            $estudios_padre[strtolower($estudios_padre_opciones[$key]->texto)] = $estudios_padre_opciones[$key]->porcentaje;
        }
        arsort($estudios_padre);
        // Estudios madre
        $estudios_madre_pregunta = $cuestionario->where('es_pregunta', 1)->where('valor', 27)->first();
        $estudios_madre_opciones = $cuestionario->where('id_padre', $estudios_madre_pregunta['id']);
        $estudios_madre = [];
        foreach($estudios_madre_opciones as $key => $value) {
            $estudios_madre_opciones[$key]->total = $datos_gen->where('p27', $estudios_madre_opciones[$key]->valor)->count();
            $estudios_madre_opciones[$key]->porcentaje = round($estudios_madre_opciones[$key]->total * 100 / $total,1);
            $estudios_madre[strtolower($estudios_madre_opciones[$key]->texto)] = $estudios_madre_opciones[$key]->porcentaje;
        }
        arsort($estudios_madre);
        // Ocupaciones padre
        $ocupacion_padre_pregunta = $cuestionario->where('es_pregunta', 1)->where('valor', 28)->first();
        $ocupacion_padre_opciones = $cuestionario->where('id_padre', $ocupacion_padre_pregunta['id']);
        $ocupacion_padre = [];
        foreach($ocupacion_padre_opciones as $key => $value) {
            $ocupacion_padre_opciones[$key]->total = $datos_gen->where('p28', $ocupacion_padre_opciones[$key]->valor)->count();
            $ocupacion_padre_opciones[$key]->porcentaje = round($ocupacion_padre_opciones[$key]->total * 100 / $total,1);
            $ocupacion_padre[strtolower($ocupacion_padre_opciones[$key]->texto)] = $ocupacion_padre_opciones[$key]->porcentaje;
        }
        arsort($ocupacion_padre);
        // Ocupaciones madre
        $ocupacion_madre_pregunta = $cuestionario->where('es_pregunta', 1)->where('valor', 29)->first();
        $ocupacion_madre_opciones = $cuestionario->where('id_padre', $ocupacion_madre_pregunta['id']);
        $ocupacion_madre = [];
        foreach($ocupacion_madre_opciones as $key => $value) {
            $ocupacion_madre_opciones[$key]->total = $datos_gen->where('p29', $ocupacion_madre_opciones[$key]->valor)->count();
            $ocupacion_madre_opciones[$key]->porcentaje = round($ocupacion_madre_opciones[$key]->total * 100 / $total,1);
            $ocupacion_madre[strtolower($ocupacion_madre_opciones[$key]->texto)] = $ocupacion_madre_opciones[$key]->porcentaje;
        }
        arsort($ocupacion_madre);
        // Aportación del ingreso familiar
        $aportacion = round($datos_gen->whereIn('p31', [1,2])->count() * 100 / $total,1);
        // if($aportacion > 25) {
        //     $mas_o_menos
        // }

        $data = [
            'generacion' => substr($gen,0,4),
            'total' => $total,
            'hombres' => $porcentaje_hombres,
            'mujeres' => $porcentaje_mujeres,
            'bach_opciones' => $bach_opciones,
            'bach_unam' => $porcentaje_bach_unam,
            'pase_reglamentado' => $porcentaje_pase_reglamentado,
            'concurso' => $porcentaje_concurso,
            'calif_moda' => $calif_bach_moda,
            'calif_opciones' => $calif_bach_opciones,
            'a_tiempo' => $a_tiempo,
            'razones' => $razones,
            'razones_unam' => $razones_unam,
            'posgrado_ext' => $posgrado_ext,
            'perspectiva' => $perspectiva,
            'padres_juntos' => $padres_juntos,
            'hermanos' => $hermanos,
            'estudios_padre' => $estudios_padre,
            'estudios_madre' => $estudios_madre,
            'ocupacion_padre' => $ocupacion_padre,
            'ocupacion_madre' => $ocupacion_madre,
        ];
        return view('reporte_sivacore', $data);
    }
}
