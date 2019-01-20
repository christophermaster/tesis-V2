<?php

namespace Gestion\Http\Controllers;

use Illuminate\Http\Request;
use Gestion\models\ExerciseTemporaryEvaluation;
use Gestion\models\TemporaryEvaluation;
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
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Gestion\User;
use File;
use DB;

/**
 * Controlador que se usa Para subir y descargar archivos
 */
class PDFExportController extends Controller
{
    /**
     * Verificamos que el usaurio este logiado 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Lista Todos Los Archivos*/
    public function index(Request $request){
    try {
        DB::beginTransaction();   
        $evaluation = new TemporaryEvaluation;
        //obtengo el  usuario
        $usuario = Auth::user();
        //obtengo la fecha de hopy 
        //obtengo el nombre da tema,facultad,escuela ,catedra,etc..
        $tema = Topic::findOrfail($request->get('tema'));
        $dificultad = Difficulty::findOrfail($request->get('dificultad'));
        $typeEvaluation = TypeEvaluation::findOrfail($request->get('tipo'));
        $evaluations = TypeExercise::findOrfail($request->get('evaluacion'));

        $hoy = date("Y-m-d");
        $evaluation->id_tema = $tema->id;
        $evaluation->tema = $tema->nombre;   

        $evaluation->id_tipo = $typeEvaluation->id;
        $evaluation->tipo = $typeEvaluation->nombre;

        $evaluation->id_evaluacion = $evaluations->id;
        $evaluation->evaluacion = $evaluations->nombre;

        $evaluation->id_dificultad = $dificultad->id;
        $evaluation->dificultad = $dificultad->nombre;

        $evaluation->fecha =$hoy;
        $evaluation->id_usuario = $usuario->id;
        $evaluation->cantidad_teorico = $request->get('cantA');
        $evaluation->cantidad_practico = $request->get('cantB');
        $evaluation->impreso = 1;
        $evaluation->generada = 1;

        if(Auth::check()){
            $evaluation->usuario_creador=$usuario->name;
            $evaluation->usuario_modificador= $usuario->name;
        }

        $evaluation->created_at = $hoy;
        $evaluation->updated_at = $hoy;
        $evaluation->save();

        if($request->get('a')[0] !== null){
            $todos = (array) json_decode($request->get('a')[0]);
            
            foreach ($todos as $todo) {
               $arrayTodos[] = $todo->id;
                $exerciseTemporaryEvaluation = new ExerciseTemporaryEvaluation;
                $exerciseTemporaryEvaluation->id_ejercicio =  $todo->id;
                $exerciseTemporaryEvaluation->id_temporal_evaluation = $evaluation->id;
                $exerciseTemporaryEvaluation->save();
            }
            
            $todos = DB::table('exercises')->whereIn('id', $arrayTodos)->get();
        }else{
            $todos = [];
        }
      
        if($request->get('b')[0] == null){
            $teorico = [];
            $practico = [];
        }else{
            $teorico = (array) json_decode($request->get('b')[0]);
            $practico = (array) json_decode($request->get('c')[0]);

            foreach ($practico as $prac) {
               $arrayPractico[] = $prac->id;
                $exerciseTemporaryEvaluation = new ExerciseTemporaryEvaluation;
                $exerciseTemporaryEvaluation->id_ejercicio =  $prac->id;
                $exerciseTemporaryEvaluation->id_temporal_evaluation = $evaluation->id;
                $exerciseTemporaryEvaluation->save();
            }
            foreach ($teorico as $teo) {
               $arrayTeorico[] = $teo->id;
                $exerciseTemporaryEvaluation = new ExerciseTemporaryEvaluation;
                $exerciseTemporaryEvaluation->id_ejercicio =  $teo->id;
                $exerciseTemporaryEvaluation->id_temporal_evaluation = $evaluation->id;
                $exerciseTemporaryEvaluation->save();
            }
            $teorico = DB::table('exercises')->whereIn('id', $arrayTeorico)->get();
            $practico = DB::table('exercises')->whereIn('id', $arrayPractico)->get();
        }

        flash('Se gurdo de forma Corracta')->info();
        DB::commit();

        return view("management.evaluation.resultado",["todos" => $todos, "teorico" => $teorico,
           "practico"=>$practico,'ver'=> $request->get('ver') ]);
    
        } catch (Exception $e){

            flash('Error al Generar la evaluacion ejercicio')->error();
            DB::rollback();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manual(Request $request)
    {
        try {
           
        DB::beginTransaction();   
        $evaluation = new TemporaryEvaluation;
        //obtengo el  usuario
        $usuario = Auth::user();
        //obtengo la fecha de hopy 
        //obtengo el nombre da tema,facultad,escuela ,catedra,etc..
        $tema = Topic::findOrfail($request->get('tema'));
        $dificultad = Difficulty::findOrfail($request->get('dificultad'));
        $typeEvaluation = TypeEvaluation::findOrfail($request->get('tipo'));
        $evaluations = TypeExercise::findOrfail($request->get('evaluacion'));

        $hoy = date("Y-m-d");
        $evaluation->id_tema = $tema->id;
        $evaluation->tema = $tema->nombre;   

        $evaluation->id_tipo = $typeEvaluation->id;
        $evaluation->tipo = $typeEvaluation->nombre;

        $evaluation->id_evaluacion = $evaluations->id;
        $evaluation->evaluacion = $evaluations->nombre;

        $evaluation->id_dificultad = $dificultad->id;
        $evaluation->dificultad = $dificultad->nombre;

        $evaluation->fecha =$hoy;
        $evaluation->id_usuario = $usuario->id;
        $evaluation->cantidad_teorico = $request->get('cantA');
        $evaluation->cantidad_practico = $request->get('cantB');
        $evaluation->impreso = 1;
        $evaluation->generada = 1;

        if(Auth::check()){
            $evaluation->usuario_creador=$usuario->name;
            $evaluation->usuario_modificador= $usuario->name;
        }

        $evaluation->created_at = $hoy;
        $evaluation->updated_at = $hoy;
        $evaluation->save();

        $todos = $request->get('id');
            
        foreach ($todos as $todo) {
            $arrayTodos[] = $todo;
            $exerciseTemporaryEvaluation = new ExerciseTemporaryEvaluation;
            $exerciseTemporaryEvaluation->id_ejercicio =  $todo;
            $exerciseTemporaryEvaluation->id_temporal_evaluation = $evaluation->id;
            $exerciseTemporaryEvaluation->save();
        }

        if($request->get('ver') !== "3"){
            $todos = DB::table('exercises')->whereIn('id', $arrayTodos)->get();
            $teorico = [];
            $practico = [];
        }else{
            $todos = [];
            $teorico = [];
            $practico = [];
            $teorico = DB::table('exercises')->whereIn('id', $arrayTodos)
            ->where('id_tipo',1)
            ->get();
            $practico = DB::table('exercises')->whereIn('id', $arrayTodos)
            ->where('id_tipo',2)
            ->get();
        }
      
   

        flash('Se gurdo de forma Corracta')->info();
        DB::commit();

        return view("management.evaluation.resultado",["todos" => $todos, "teorico" => $teorico,
           "practico"=>$practico,'ver'=> $request->get('ver') ]);
    
        } catch (Exception $e){

            flash('Error al Generar la evaluacion ejercicio')->error();
            DB::rollback();
        }
    }
    public function ver($id)
    {  
        $evaluation = TemporaryEvaluation::find($id);
        
        $exerciseTemporaryEvaluation = ExerciseTemporaryEvaluation::where('id_temporal_evaluation',$evaluation->id)->get();
        foreach ($exerciseTemporaryEvaluation as $todo) {
            $arrayTodos[] = $todo->id_ejercicio;
        }

        if($evaluation->id_evaluacion !== 3){
            $todos = DB::table('exercises')->whereIn('id', $arrayTodos)->get();
            $teorico = [];
            $practico = [];
        }else{
            $todos = [];
            $teorico = [];
            $practico = [];
            $teorico = DB::table('exercises')->whereIn('id', $arrayTodos)
            ->where('id_tipo',1)
            ->get();
            $practico = DB::table('exercises')->whereIn('id', $arrayTodos)
            ->where('id_tipo',2)
            ->get();
        }
      
        return view("management.evaluation.resultado",["todos" => $todos, "teorico" => $teorico,
           "practico"=>$practico,'ver'=> $evaluation->id_evaluacion ]);
    
    }
}
