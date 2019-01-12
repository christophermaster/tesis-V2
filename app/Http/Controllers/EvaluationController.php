<?php

namespace Gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Gestion\Http\Requests\ExerciseRequest;
use Gestion\models\TypeEvaluation;
use Gestion\models\People;
use Gestion\models\Teacher;
use Gestion\models\School;
use Gestion\models\Cathedra;
use Gestion\models\Matter;
use Gestion\models\Topic;
use Gestion\models\Exercise;
use Gestion\models\TypeExercise;
use Gestion\models\Difficulty;
use Gestion\models\Content;
use Gestion\models\Upload;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Middleware\Authenticate;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use DB;
use Gestion\User;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rand = range(1, 13);
        shuffle($rand);
        $pila = array();
        for ($i = 0; $i < 4; $i++) {
            array_push($pila,$rand[$i]);
        }
        print_r($pila);
        dd($pila);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $evaluation = new TemporaryEvaluation;
        //obtengo el  usuario
        $usuario = Auth::user();
        //obtengo la fecha de hopy 
        $hoy = date("Y-m-d");
        //obtengo el nombre da tema,facultad,escuela ,catedra,etc..
        $tema = Topic::findOrfail($request->get('tema'));
        $dificultad = Difficulty::findOrfail($request->get('dificultad'));
        $typeEvaluation = TypeEvaluation::findOrfail($request->get('tipo'));
        $evaluations = TypeExercise::findOrfail($request->get('evaluacion'));

        $evaluation->id_tema = $tema->id;
        $evaluation->tema = $tema->nombre;   

        $evaluation->id_tipo = $typeEvaluation->id;
        $evaluation->tipo = $typeEvaluation->nombre;

        $evaluation->id_evaluacion = $evaluations->id;
        $evaluation->evaluacion = $evaluations->nombre;

        $evaluation->id_dificultad = $dificultad->id;
        $evaluation->dificultad = $dificultad->nombre;

        $evaluation->fecha =$request->get('fecha');
        $evaluation->id_usuario = $usuario->id;

        $evaluation->impreso = 0;

        if(Auth::check()){
            $evaluation->usuario_creador=$usuario->name;
            $evaluation->usuario_modificador= $usuario->name;
        }

        $evaluation->created_at = $hoy;
        $evaluation->updated_at = $hoy;

        $evaluation->save();

        if ($request->get('generar') == 1) {

        } else {

        }

        return Redirect::to('crear/evaluacion/'.$evaluation->id);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function IndexCreate()
    {
        $tema=DB::table('topics as t')
        ->select('t.*')
        ->get();

        $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();

        $tipo=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();

        $tipo_evaluacion=DB::table('type_evaluations as t')
        ->select('t.id','t.nombre')
        ->get();

        return view("management.evaluation.index_create",["dificultad"=>$dificultad,
        "tipo"=>$tipo,"tema"=>$tema, "tipo_evaluacion"=>$tipo_evaluacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
