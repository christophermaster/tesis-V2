<?php

namespace Gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\ExerciseRequest;
use Gestion\models\Faculty;
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
use gestion\User;

class ExerciseController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Mostramos la vista de la creacion de un ejercicio 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //obtenemos los datos para mostrarlos en la vista  de la creacion de un ejercicio

        // obtenemos el tema
        $tema=DB::table('topics as t')
        ->select('t.*')
        ->get();
        // obtenemos el contenido 
        $contenido=DB::table('contents as c')
        ->select('c.*')
        ->where("c.id_tema","=","1")
        ->get();
        // obtenemos el tipo de ejercicio 
        $tipo_ejercicio=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();
        // obtenemos la dificultad
        $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();
        return view("management.exercise.create",["tema"=>$tema,"contenido"=>$contenido,
        "dificultad"=>$dificultad,"tipo"=>$tipo_ejercicio]);
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
