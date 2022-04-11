<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Departamento;
use App\Models\Asignatura;
use App\Models\P15;
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
        $data = Asignatura::where('depto_id',$depto_id)->get();

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

        $asignatura = Asignatura::where('id', $post_data['asignatura'])->first();
        $respuestas = P15::where('depto_id',$post_data['departamento'])->where('asig_id', $asignatura->nombre)->get();
        $data = array(
            'asignatura' => $asignatura,
            'pos_count' => $respuestas->where('p15', 1)->count(),
            'neg_count' => $respuestas->where('p15', '!=', 1)->count(),
            'pos_respuestas' => $respuestas->where('p15', 1),
            'neg_respuestas' => $respuestas->where('p15', '!=', 1),
        );
        \Log::info($data);
        return view('resultados', $data);
    }
}
