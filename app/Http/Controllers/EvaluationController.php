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
use PDF;
class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $query= trim($request->get('searchText'));
       $temporaryEvaluation = DB::table('temporaryevaluations as tem')
                    ->select('tem.*')
                    ->where('tem.tema','LIKE','%'.$query.'%')
                    ->get();

        return view("management.evaluation.index",["temporaryEvaluation" => $temporaryEvaluation,
        'searchText' => $query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $todos = [];
        $practico = [];
        $teorico = [];

        if($request->get('generar') == 1) {

            if($request->get('evaluacion') !== "3"){
                $todos = Exercise::where('id_tipo',$request->get('evaluacion'))
                ->where('id_tema',$request->get('tema'))
                ->get()
                ->random(2);
            }else {
                
                $teorico = Exercise::where('id_tipo',1)
                ->where('id_tema',$request->get('tema'))
                ->get()
                ->random(2);
                $practico = Exercise::where('id_tipo',2)
                ->where('id_tema',$request->get('tema'))
                ->get()
                ->random(2);
            }

        } else {

            if($request->get('evaluacion') !== "3"){

                $todos = Exercise::where('id_tipo',$request->get('evaluacion'))
                ->where('id_tema',$request->get('tema'))
                ->get();

            }else {

                $teorico = Exercise::where('id_tipo',1)
                ->where('id_tema',$request->get('tema'))
                ->get();

                $practico = Exercise::where('id_tipo',2)
                ->where('id_tema',$request->get('tema'))
                ->get();
                
            }
            
           return view("management.evaluation.index_publication",["todos" => $todos, "teorico" => $teorico,
           "practico"=>$practico, "dificultad"=>$request->get('dificultad'),"tipo"=>$request->get('tipo'),
           "tema"=>$request->get('tema'), "evaluacion"=>$request->get('evaluacion'),'ver'=> $request->get('evaluacion'),
           "cantA"=>$request->get('nTeorico'),"cantB"=>$request->get('nPractico')]);
        }
              //obtengo el nombre da tema,facultad,escuela ,catedra,etc..
        return view("management.evaluation.random",["todos" => $todos, "teorico" => $teorico,
           "practico"=>$practico, "dificultad"=>$request->get('dificultad'),"tipo"=>$request->get('tipo'),
           "tema"=>$request->get('tema'),"evaluacion"=>$request->get('evaluacion'),
           'ver'=> $request->get('evaluacion'),"cantA"=>$request->get('nTeorico'),
           "cantB"=>$request->get('nPractico')]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function IndexCreate()
    {
        $usuario = Auth::user();

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

        $temporaryEvaluation = DB::table('temporaryevaluations as tem')
                    ->select('tem.*')
                    ->where("tem.id_usuario","=",$usuario->id)
                    ->get();

        return view("management.evaluation.index_create",["dificultad"=>$dificultad,
        "tipo"=>$tipo,"tema"=>$tema, "tipo_evaluacion"=>$tipo_evaluacion, "temporaryEvaluation" => $temporaryEvaluation]);
    }

}
