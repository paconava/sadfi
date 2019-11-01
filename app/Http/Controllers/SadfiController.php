<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuestionario;
use DB;
use Exception;

class SadfiController extends Controller {

    public function postGen(Request $request) {

        $validatedData = $request->validate([
            'generacion' => 'required'
        ],['generacion.required' => 'Debes elegir una generación']);

        $gen = $validatedData['generacion'];

        $cuestionario = Cuestionario::get();
        $p26 = $cuestionario->where('es_pregunta', 1)->where('valor', 26)->first();
        $p27 = $cuestionario->where('es_pregunta', 1)->where('valor', 27)->first();

        $respuestas_p26 = $cuestionario->where('es_respuesta', 1)->where('id_padre', $p26->id)->pluck('texto');
        $respuestas_p27 = $cuestionario->where('es_respuesta', 1)->where('id_padre', $p27->id)->pluck('texto');
        $padre = $this->getEstudiosPadreXGen($gen);
        $madre = $this->getEstudiosMadreXGen($gen);

        $dataPoints1 = array(
            array("y" => $padre[1], "label" => $respuestas_p26[0]),
            array("y" => $padre[2], "label" => $respuestas_p26[1]),
            array("y" => $padre[3], "label" => $respuestas_p26[2]),
            array("y" => $padre[4], "label" => $respuestas_p26[3]),
            array("y" => $padre[5], "label" => $respuestas_p26[4]),
            array("y" => $padre[6], "label" => $respuestas_p26[5]),
            array("y" => $padre[7], "label" => $respuestas_p26[6]),
            array("y" => $padre[8], "label" => $respuestas_p26[7]),
            array("y" => $padre[9], "label" => $respuestas_p26[8]),
            array("y" => $padre[10], "label" => $respuestas_p26[9])
        );
        $dataPoints2 = array(
            array("y" => $madre[1], "label" => $respuestas_p27[0]),
            array("y" => $madre[2], "label" => $respuestas_p27[1]),
            array("y" => $madre[3], "label" => $respuestas_p27[2]),
            array("y" => $madre[4], "label" => $respuestas_p27[3]),
            array("y" => $madre[5], "label" => $respuestas_p27[4]),
            array("y" => $madre[6], "label" => $respuestas_p27[5]),
            array("y" => $madre[7], "label" => $respuestas_p27[6]),
            array("y" => $madre[8], "label" => $respuestas_p27[7]),
            array("y" => $madre[9], "label" => $respuestas_p27[8]),
            array("y" => $madre[10], "label" => $respuestas_p27[9])
        );

        $total = 0;
        foreach ($padre as $p) {
            $total += $p;
        }
        return view('sadfi', compact('cuestionario', 'dataPoints1', 'dataPoints2', 'gen', 'total'));
    }

    public function postGenVsGen(Request $request) {
        $validatedData = $request->validate([
            'cual' => 'required',
            'genvsgen1' => 'required',
            'genvsgen2' => 'required'
        ],['genvsgen1.required' => 'Debes elegir una generación 1',
            'genvsgen2.required' => 'Debes elegir una generación 2',
            'cual.required' => 'Debes elegir un padre'
        ]);

        //$cuestionario = Cuestionario::get();
        if ($validatedData['cual'] == 'p') {
            $p = Cuestionario::where('es_pregunta', 1)->where('valor', 26)->first();    
            $r = Cuestionario::where('es_respuesta', 1)->where('id_padre', $p->id)->pluck('texto');
            $res1 = $this->getEstudiosPadreXGen($validatedData['genvsgen1']);
            $res2 = $this->getEstudiosPadreXGen($validatedData['genvsgen2']);
        } else if($validatedData['cual'] == 'm') {
            $p = Cuestionario::where('es_pregunta', 1)->where('valor', 27)->first();
            $r = Cuestionario::where('es_respuesta', 1)->where('id_padre', $p->id)->pluck('texto');
            $res1 = $this->getEstudiosMadreXGen($validatedData['genvsgen1']);
            $res2 = $this->getEstudiosMadreXGen($validatedData['genvsgen2']);
        }
        $dataPoints1 = array(
            //array("y" => $res1[1], "label" => $r[0]),
            //array("y" => $res1[2], "label" => $r[1]),
            array("y" => $res1[3], "label" => $r[2]),
            array("y" => $res1[4], "label" => $r[3]),
            array("y" => $res1[5], "label" => $r[4]),
            //array("y" => $res1[6], "label" => $r[5]),
            array("y" => $res1[7]+$res1[8], "label" => "Licenciatura terminada"),
            //array("y" => $res1[8], "label" => $r[7]),
            array("y" => $res1[9], "label" => $r[8]),
            //array("y" => $res1[10], "label" => $r[9])
        );
        $dataPoints2 = array(
            //array("y" => $res2[1], "label" => $r[0]),
            //array("y" => $res2[2], "label" => $r[1]),
            array("y" => $res2[3], "label" => $r[2]),
            array("y" => $res2[4], "label" => $r[3]),
            array("y" => $res2[5], "label" => $r[4]),
            //array("y" => $res2[6], "label" => $r[5]),
            array("y" => $res2[7]+$res2[8], "label" => "Licenciatura terminada"),
            //array("y" => $res2[8], "label" => $r[7]),
            array("y" => $res2[9], "label" => $r[8]),
            //array("y" => $res2[10], "label" => $r[9])
        );
        //dd($validatedData);
        return view('genvsgen', compact('dataPoints1', 'dataPoints2', 'validatedData'));
    }

    public function getExpele(Request $request) {
        $validatedData = $request->validate([
            'num_cta' => 'required|numeric|digits:9'
        ],['num_cta.required' => 'El campo es obligatorio',
          'num_cta.numeric' => 'El campo debe contener solo números',
          'num_cta.digits'  => 'El campo debe ser de 9 dígitos'
        ]);

        try {
            $postData = array('nickname' => 'condoc', 'password' => 'c0nD0c.');
            $url = 'https://ingreso.dgae.unam.mx:8006/api/auth/login';
            $ch = curl_init();

            // Verificamos que se haya inicializado correctamente
            if ($ch === false) {
                throw new Exception('Ha fallado la inicialización');
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json'
            ));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $data_access = curl_exec($ch);

            // Verifica que lo que regresa curl_exec() no sea falso. En caso contrario, tira exception
            if ($data_access === false) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            }
            $data_access = json_decode($data_access);
            // Cierra el handle
            curl_close($ch);
        } catch(Exception $e) {
            trigger_error(sprintf(
                'Curl falló con error #%d: %s',
                $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
        }

        try {
            $postData = array('numero_cuenta' => $validatedData['num_cta'], 'token' => $data_access->access_token);
            $url = "https://ingreso.dgae.unam.mx:8006/api/auth/getExpele";
            $ch = curl_init();
            // Verifica que se haya inicializado correctamente
            if ($ch === false) {
                throw new Exception('Ha fallado la inicialización');
            }
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);

            // Verifica que lo que regresa curl_exec() no sea falso. En caso contrario, tira exception
            if ($data === false) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            }
            $data = json_decode($data);

            curl_close($ch);
        } catch(Exception $e) {
            trigger_error(sprintf(
                'Curl falló con error #%d: %s',
                $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
        }
        if(isset($data->message) || $data == null) {
            dd($data);
        }
        return view('expele', compact('data'));
    }

    public function getEstudiosPadreXGen($gen) {
    	$res = array();

        for ($i=0; $i <=10 ; $i++) { 
        	$res[$i] = DB::table('eval_educ2.sds_x_aa')
			->where('registro', '=', $gen)
			->where('p26', '=', $i)
			->count();
        }

        return $res;
    }

    public function getEstudiosMadreXGen($gen) {
    	$res = array();

        for ($i=0; $i <=10 ; $i++) {
        	$res[$i] = DB::table('eval_educ2.sds_x_aa')
			->where('registro', '=', $gen)
			->where('p27', '=', $i)
			->count();
        }

        return $res;
    }
}
