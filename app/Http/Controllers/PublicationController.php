<?php

namespace Gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Gestion\Http\Requests\ExerciseRequest;
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

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtengo el usuario 
        $usuario = Auth::user(); 

        $cantEjercicio = DB::table('exercises as exx')
        ->select(DB::raw('count(*) as cantidad'))
        ->where('exx.id_usuario','=', $usuario->id)
        ->get()
        ->first();
        //cabtidad de soluciones subido por usuario
        $cantSoluciones = DB::table('solutions as sol')
        ->select(DB::raw('count(*) as cantidad'))
        ->where('sol.id_usuario','=', $usuario->id)
        ->get()
        ->first();

         $cantUpdate = DB::table('uploads as up')
        ->select(DB::raw('count(*) as cantidad'))
        ->where('up.id_usuario','=', $usuario->id)
        ->get()
        ->first();

        $cantTemporaryEvaluations = DB::table('temporaryevaluations as up')
        ->select(DB::raw('count(*) as cantidad'))
        ->where('up.id_usuario','=', $usuario->id)
        ->get()
        ->first();
        
        return view('publication.index',[ "cantEjercicio"=>$cantEjercicio,
        "cantSoluciones"=>$cantSoluciones,"cantUpdate"=>$cantUpdate,
        "cantTemporaryEvaluations"=>$cantTemporaryEvaluations]);
    }

    public function myExercise(Request $request){

        if($request){

            //variable que me permite saber donde estoy 
            $ubication = "Publication";
            //obtengo el usuario 
            $usuario = Auth::user();
            //obtengo los ejercicios 
            $query=trim($request->get('searchText'));
            $ejercicio=DB::table('exercises as ex')
                ->select('ex.*')
                ->where('ex.id_usuario','=', $usuario->id)
                ->where('ex.contenido','LIKE','%'.$query.'%')
                ->orwhere('ex.tema','LIKE','%'.$query.'%')
                ->orderBy('ex.id','desc')
                ->paginate(2);
           
            return view("management.exercise.index",["ejercicio"=>$ejercicio,
            "usuario"=>$usuario,"searchText"=>$query,"ubication"=>$ubication]);
        }

    }

    public function mySolution(Request $request){

        if($request){

            //variable que me permite saber donde estoy 
            $ubication = "Publication";
            //obtengo el usuario 
            $usuario = Auth::user();
            //obtengo los ejercicios 
            $query=trim($request->get('searchText'));
            $solucion=DB::table('solutions as ex')
                ->select('ex.*')
                ->where('ex.id_usuario','=', $usuario->id)
                ->where('ex.contenido','LIKE','%'.$query.'%')
                ->orderBy('ex.id','desc')
                ->get();
            
            return view("management.solution.index",["solucion"=>$solucion,"searchText"=>$query,
            "ubication"=>$ubication]);
        }

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
