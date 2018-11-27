<?php

namespace Gestion\Http\Controllers;

use Illuminate\Http\Request;
use Gestion\models\Upload;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Gestion\Http\Requests\ExerciseRequest;
use Gestion\models\Faculty;
use Gestion\models\School;
use Gestion\models\Cathedra;
use Gestion\models\Matter;
use Gestion\models\Topic;
use Gestion\models\Exercise;
use Gestion\models\Content;
use Gestion\User;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;
use File;
use DB;

/**
 * Controlador que se usa Para subir y descargar archivos
 */
class UploadController extends Controller
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

        $usuario = Auth::user();
        //variable que me permite saber donde estoy 
        $ubication = "Home";
        $query=trim($request->get('searchText'));
        if($request){
            $upload=DB::table('uploads as upl')
            ->select('upl.*')
            ->where('upl.titulo','LIKE','%'.$query.'%')
            ->orderBy('upl.id','desc')
            ->paginate(40);
            return view('upload_file.index',["upload"=>$upload,"searchText"=>$query,
            "ubication"=>$ubication]);
        }
    }

    public function miMaterialDigitalizado(Request $request){

        //obtenemos el usuario 
        $usuario = Auth::user();

        //verificamo que haya respuesta 
        if($request){
            $upload=DB::table('uploads as upl')
            ->select('upl.*')
            ->where('upl.id_usuario','=',$usuario->id)
            ->orderBy('upl.id','desc')
            ->paginate(40);

            return view('upload.miMaterialDigitalizado',["upload"=>$upload]);
        }

    }

    public function upload(){
        return view('upload_file.upload');
    }
    
    public function uploaded(Request $request){

        $upload = new Upload;
        $usuario = Auth::user();
        $hoy = date("Y-m-d H:i:s");
        if($request->hasFile('file'))
    	{
            $upload->id_usuario = $usuario->id;
            $upload->usuario_creador= $usuario->name;
            $upload->usuario_modificador= $usuario->name;
            $upload->created_at = $hoy;
            $upload->updated_at = $hoy;
            $upload->aprobado = 1;
            $upload->titulo =$request->get('titulo');
            $upload->descripcion =$request->get('descripcion');
    		$imageFile = $request->file('file');
            $imageName = $imageFile->getClientOriginalName();
            $upload->tipo_archivo = $imageFile->getClientMimeType();
            $upload->ruta = 'uploads/'.$imageName;
            $upload->save();
            $imageFile->move(public_path('uploads'), $imageName);
        }
        
        return view('home.home');
    }

    public function downloadFile($id){
      $upload = Upload::findOrfail($id);
      $pathtoFile = public_path()."/".$upload->ruta;
      return response()->download($pathtoFile);
    }

    public function destroy($id){

        $upload = Upload::findOrfail($id);
        $pathtoFile = public_path()."/".$upload->ruta;

        if(file_exists(public_path($upload->ruta))){
            Upload::destroy($id);
            unlink(public_path($upload->ruta));
            flash('El archivo fue eliminidado de forma exitosa')->success();
        }else{
            flash('El archivo fue eliminidado de forma exitosa')->success();
            Upload::destroy($id);
        }
       return back();
    }

}
