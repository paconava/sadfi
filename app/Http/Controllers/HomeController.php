<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Departamento;
use App\Models\Asignatura;
use App\Models\Encuesta;
use App\Models\Semestre;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $divisiones = Division::get();
        return view('home', compact('divisiones'));
    }

    public function getDepartamento($division_id)
    {
        $data = Departamento::where('division_id',$division_id)->get();

        \Log::info($data);
        return response()->json(['data' => $data]);
    }

    public function getAsignatura($depto_id)
    {
        $depto = Departamento::where('nombre', $depto_id)->first();
        $data = Asignatura::where('depto_id',$depto->id)->get();

        \Log::info($data);
        return response()->json(['data' => $data]);
    }

    public function obtenerResultados(Request $request)
    {
        $post_data = $request->validate([
            'division' => 'required',
            'departamento' => 'required',
            'asignatura' => 'required'
        ],[
            'division.required' => "El campo División es obligatorio",
            'departamento.required' => "El campo Departamento es obligatorio",
            'asignatura.required' => "El campo Asignatura es obligatorio"
        ]);

        // $asignatura = Asignatura::where('id', $post_data['asignatura'])->first();
        // $respuestas = Encuesta::where('depto',$post_data['departamento'])->where('asignatura', $asignatura->nombre)->get(['semestre', 'p15', 'p15_just']);
        // $semestres = Semestre::get();
        // foreach($semestres as $sem) {
        //     $sem['pos_count'] = $respuestas->where('p15', 1)->where('semestre', $sem->semestre)->count();
        //     $sem['neg_count'] = $respuestas->where('p15', '!=', 1)->where('semestre', $sem->semestre)->count();
        //     $sem['pos_respuestas'] = $respuestas->where('p15', 1)->where('semestre', $sem->semestre);
        //     $sem['neg_respuestas'] = $respuestas->where('p15', '!=', 1)->where('semestre', $sem->semestre);
        //     $sem->semestre = substr($sem->semestre, 0, 4)."-".$sem->semestre[4];
        // }
        // $data = array(
        //     'asignatura' => $asignatura,
        //     'semestres' => $semestres,
        //     'departamento' => $post_data['departamento']
        // );
        
        // \Log::info($data);
        return view('resultados', $this->datosEncuesta($post_data));
    }

    public function resultadosPdf(Request $request)
    {
        $data = $this->datosEncuesta($request->all());
        $data['chartImg'] = $request['chartImg'];
        $pdf = PDF::loadView('pdf.resultados_pdf', $data);
        return $pdf->stream($data['asignatura']->nombre.'.pdf');
    }

    private function datosEncuesta($data) {
        $asignatura = Asignatura::where('id', $data['asignatura'])->first();
        $respuestas = Encuesta::where('depto',$data['departamento'])->where('asignatura', $asignatura->nombre)->get(['semestre', 'p15', 'p15_just']);
        $semestres = Semestre::get();
        foreach($semestres as $sem) {
            $sem['pos_count'] = $respuestas->where('p15', 1)->where('semestre', $sem->semestre)->count();
            $sem['neg_count'] = $respuestas->where('p15', '!=', 1)->where('semestre', $sem->semestre)->count();
            $sem['pos_respuestas'] = $respuestas->where('p15', 1)->where('semestre', $sem->semestre);
            $sem['neg_respuestas'] = $respuestas->where('p15', '!=', 1)->where('semestre', $sem->semestre);
            $sem->semestre = substr($sem->semestre, 0, 4)."-".$sem->semestre[4];
        }
        $resultados = array(
            'asignatura' => $asignatura,
            'semestres' => $semestres,
            'departamento' => $data['departamento']
        );
        
        \Log::info($data);
        return $resultados;
    }
}
