<?php

namespace Gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Gestion\Http\Requests\ExerciseRequest;
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
use Gestion\User;

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
    public function index(Request $request)
    {
        if($request){

            $ubication ="Home";
            //obtengo el usuario 
            $usuario = Auth::user();
            //obtengo los ejercicios 
            $query=trim($request->get('searchText'));
            $ejercicio=DB::table('exercises as ex')
                ->select('ex.*')
                //->where('ex.id_usuario','=', $usuario->id)
                ->where('ex.contenido','LIKE','%'.$query.'%')
                ->orwhere('ex.tema','LIKE','%'.$query.'%')
                ->orderBy('ex.id','desc')
                ->paginate(2);
           
            return view("management.exercise.index",["ejercicio"=>$ejercicio,
            "usuario"=>$usuario,"searchText"=>$query,"ubication"=>$ubication]);
        }
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
     * Funcion que se encarga de guardar los ejercicios .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if(Auth::check()){

            try {
                DB::beginTransaction();
                //obtengo el usuario logueado 
                 
                $usuario = Auth::user();
                
                //obtengo la fecha de hopy 
                $hoy = date("Y-m-d H:i:s");
                //obtengo el nombre da tema,facultad,escuela ,catedra,etc..
                $tema = Topic::findOrfail($request->get('tema'));
                $contenido = Content::findOrfail($request->get('contenido'));
                $dificultad = Difficulty::findOrfail($request->get('dificultad'));
                $tipo = TypeExercise::findOrfail($request->get('tipo'));
               
                //instanceo el modelo y le asiganos sus valores para guardarl0
                $exercise = new Exercise;
                //detalles id
                $exercise->id_tema = $request->get('tema');
                $exercise->id_contenido = $request->get('contenido');
                $exercise->id_dificultad = $request->get('dificultad');
                $exercise->id_tipo = $request->get('tipo');
                // detalles nombre
                $exercise->tema = $tema->nombre;
                $exercise->nombre_contenido = $contenido->nombre;
                $exercise->tipo_nombre = $tipo->nombre ;
                $exercise->dificultad = $dificultad->nombre;

                // descripcion del ejercicio 
                $exercise->contenido = $request->get('descripcion');
              
                // usuario creador y modificador
                $exercise->id_usuario = $usuario->id;
                $exercise->usuario_creador=$usuario->name;
                $exercise->usuario_modificador= $usuario->name;
                
                // fecha de creacion y modificacion 
                $exercise->created_at = $hoy;
                $exercise->updated_at = $hoy;

                // datos adicionakles 
                $exercise->usado = 0;
                $exercise->aprobado = 1;

                // guardo 
                $exercise->save();
                

                flash('Se guardo de forma Correcta')->success();
        
                $faculty=DB::table('faculties as f')
                ->select('f.id','f.nombre')
                ->get();
                $dificultad=DB::table('difficulties as d')
                ->select('d.id','d.nombre')
                ->get();
                $tipo_ejercicio=DB::table('typeexercises as te')
                ->select('te.id','te.nombre')
                ->get();
                $ejercicio = Exercise::findOrfail($exercise->id);
                $solucion  = DB::table('solutions as sol')
                    ->select('sol.*')
                    ->where('sol.id_ejercicio','=',$exercise->id)->get();

                DB::commit();
            } catch (Exception $e){

                flash('Error al Guardar ejercicio')->error();
                DB::rollback();
            }

           // return Redirect::to('gestion/contenido/mis/publicaciones/ejercicios/detalles/'.$exercise->id);
           return Redirect::to('gestion/contenido/ejercicio/create');
        }else{
           return Redirect::to('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ejercicio = Exercise::findOrfail($id);
        $solucion  = DB::table('solutions as sol')
                    ->select('sol.*')
                    ->where('sol.id_ejercicio','=', $id)->get();
        return view("management.exercise.show",["ejer"=>$ejercicio,"solucion"=>$solucion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ejercicio = Exercise::findOrfail($id);
        $tema=DB::table('topics as t')
        ->select('t.*')
        ->get();
        $contenido=DB::table('contents as t')
        ->select('t.*')
        ->get();
        $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();
        $tipo=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();

        

        return view("management.exercise.edit",[ "dificultad"=>$dificultad,
        "tipo"=>$tipo,"tema"=>$tema, "contenido"=>$contenido,
        "ejercicio"=>$ejercicio]);
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
        if(Auth::check()){

            try {

                DB::beginTransaction();
                //obtengo el nombre del usuario
                $usuario = Auth::user();
                //obtengo el id del usuario
                $exercise = Exercise::findOrfail($id);
                //obtengo la fecha de hopy 
                $hoy = date("Y-m-d H:i:s");
                //obtengo el nombre da tema,facultad,escuela ,catedra,etc..
                $tema = Topic::findOrfail($request->get('tema'));
                $contenido = Content::findOrfail($request->get('contenido'));
                $dificultad = Difficulty::findOrfail($request->get('dificultad'));
                $tipo = TypeExercise::findOrfail($request->get('tipo'));
            
                $exercise->contenido = $request->get('descripcion');
                $exercise->id_tema = $request->get('tema');
                $exercise->id_contenido = $request->get('contenido');
                $exercise->id_dificultad = $request->get('dificultad');
                $exercise->id_tipo = $request->get('tipo');

                $exercise->dificultad = $dificultad->nombre;
                $exercise->tipo_nombre = $tipo->nombre ;
                $exercise->nombre_contenido = $contenido->nombre;
                $exercise->tema = $tema->nombre;
                $exercise->aprobado = 1;

                $exercise->usuario_modificador= $usuario->name;

                $exercise->updated_at = $hoy;
                $exercise->update();

                flash('Se Actualizo Correctamente')->success();

                DB::commit();

                return Redirect::to('gestion/contenido/ejercicio/'.$id);
          
            } catch (Exception $e){
                flash('Error al Guardar ejercicio')->error();
                DB::rollback();
            }
        }else{
            return Redirect::to('/');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exercise::destroy($id);
         //obtengo el usuario 
        $usuario = Auth::user();
        //obtengo los ejercicios 
        $ejercicio=DB::table('exercises as exx')
            ->select('exx.*')
            ->where('exx.id_usuario','=', $usuario->id)
            ->orderBy('exx.id','desc')
            ->paginate(10);
        flash('Se elimino Correctamente')->success();
        return back();
    }

    public function favorito($id){
        
        $exercise = Exercise::findOrfail($id);
        if($exercise->favorito == 1){
            $exercise->favorito = 0;
        }else{
            $exercise->favorito = 1;
        }
        
        $exercise->update();
        return back();
    }
}
