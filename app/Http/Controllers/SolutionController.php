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
use Gestion\models\Solution;
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

class SolutionController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("management.solution.create",["id"=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $ejercicio = Exercise :: findOrfail($id);
        $solucion = new Solution; 
        $usuario = Auth::user();
        $hoy = date("Y-m-d H:i:s");  
        if($ejercicio->id){

            if(Auth::check()){
                $solucion->usuario_creador=$usuario->name;
                $solucion->usuario_modificador= $usuario->name;
                $solucion->id_usuario= $usuario->id;
            }
            $solucion->id_ejercicio = $id;
            $solucion->created_at = $hoy;
            $solucion->updated_at = $hoy;
            $solucion->contenido = $request->get('descripcion');
           
            if( $usuario->id_cargo == 1 ||  $usuario->id_cargo == 2){
                $solucion->aprobado = 1;
            } else{
                $solucion->aprobado = 0;
            }
                       $solucion->save();  
            flash('Se guardo de forma Correcta')->success();
            return Redirect::to('gestion/contenido/ejercicio/'.$id);
        }

        flash('No se guardo de forma Correcta')->error();
        
        return Redirect::to('gestion/contenido/mis/publicaciones/ejercicios');
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
    public function edit($idx,$idy)
    {
        $ubication ="Home";
        $solucion = Solution::findOrfail($idy);
        return view("management.solution.edit",["solucion"=>$solucion,"id"=>$idx]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idx,$idy)
    {
        $solucion = Solution::findOrfail($idy);
        $usuario = Auth::user();
        $hoy = date("Y-m-d H:i:s");  
        $solucion->contenido=$request->get('descripcion');
        if(Auth::check()){
            $solucion->usuario_modificador= $usuario->name;
        }
        $solucion->updated_at = $hoy;
        $solucion->update();
        flash('Se actualizo de forma Correcta')->success();
        return Redirect::to('gestion/contenido/ejercicio/'.$idx);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idx,$idy)
    {
       
        Solution::destroy($idy);
        flash('Se elimino Correctamente')->success();
        return back();
    }
}
