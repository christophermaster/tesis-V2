<?php

namespace Gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Gestion\Http\Requests\ExerciseRequest;
use Gestion\models\Faculty;
use Gestion\models\Favorite;
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

class FavoriteController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //obtengo el usuario 
        $usuario = Auth::user(); 
        
        if($request){

            $ejercicio=DB::table('exercises as exx')
            ->join("favorites as fav",'exx.id','=',"fav.id_ejercicio")
            ->select('exx.*','fav.id as id_favorito')
            ->where('fav.id_usuario','=', $usuario->id)
            ->orderBy('exx.id','desc')
            ->paginate(2);
    
            $upload  = DB::table('uploads as upl')
            ->join("favorites as fav",'upl.id','=',"fav.id_archivo")
            ->select('upl.*','fav.id as id_favorito')
            ->where('fav.id_usuario','=',$usuario->id)
            ->orderBy('upl.id','desc')
            ->paginate(2);
        }
          
        return view('favorite.index',["ejercicio"=>$ejercicio,"upload" => $upload]);
      
    }
    /**Muestra todos los ejercicios  */
    public function favorito(Request $request){

        $usuario = Auth::user();
        if($request){
          
            $ejercicio=DB::table('exercises as exx')
            ->join("favorites as fav",'exx.id','=',"fav.id_ejercicio")
            ->select('exx.*','fav.id as id_favorito')
            ->where('fav.id_usuario','=', $usuario->id)
            ->orderBy('exx.id','desc')
            ->paginate(2);

            $upload  = DB::table('uploads as upl')
            ->join("favorites as fav",'upl.id','=',"fav.id_archivo")
            ->select('upl.*','fav.id as id_favorito')
            ->where('fav.id_usuario','=',$usuario->id)
            ->orderBy('upl.id','desc')
            ->paginate(2);
   
        return view('favorito.index',["ejercicio"=>$ejercicio, "upload" => $upload]);

        }
    }

    public function agregarFavoriteEjercicio($id){

        $usuario = Auth::user();
        $favorite = new Favorite;
        $verificar =DB::table('favorites as fav')
        ->select('fav.*')
        ->where('fav.id_usuario','=', $usuario->id)
        ->where('fav.id_ejercicio','=',$id)
        ->get();
        if(count($verificar) == 0){
            $favorite->id_usuario =  $usuario->id;
            $favorite->id_ejercicio = $id;
            $favorite->save();
            flash('Se ha guardado en los favoritos')->success();
        }else{
            flash('Ya se encuentra guardado en los favoritos')->error();
        }
        return back();
    }

    public function agregarFavoriteArchivo($id){

        $usuario = Auth::user();
        $favorite = new Favorite;
        $verificar =DB::table('favorites as fav')

        ->select('fav.*')
        ->where('fav.id_usuario','=', $usuario->id)
        ->where('fav.id_archivo','=',$id)
        ->get();

        if(count($verificar) == 0){
            $favorite->id_usuario =  $usuario->id;
            $favorite->id_archivo = $id;
            $favorite->save();
            flash('Se ha guardado en los favoritos')->success();
        }else{
            flash('Ya se encuentra guardado en los favoritos')->error();
        }
        return back();
    }

    public function quitarFavorite($id){
        Favorite::destroy($id);
        flash('Se elimino Correctamente')->success();
        return back() ;
    }
}
