<?php

namespace Gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Gestion\Http\Requests\TopicFormRequest;
use Gestion\models\Topic;
use Gestion\models\Module;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use DB;

class TopicController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $topic=DB::table('topics as t')
            //->join('categoria as c','a.idcategoria','=',"c.idcategoria")
            ->select('t.id','t.nombre','t.descripcion','t.numero_tema','t.usuario_creador'
            ,'t.usuario_modificador','t.created_at','t.updated_at')
            ->where('t.nombre','LIKE','%'.$query.'%')
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('t.id','asc')
            ->paginate(10);

            return view('administration.university.topic.index',
            ["topic"=>$topic,"searchText"=>$query]);
        }
        
          
    }
    public function create($id)
    {
    }
    public function store (TopicFormRequest $request)
    {

        $topic=new Topic;
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $topic->nombre = $request->get('nombre');
        $topic->descripcion = $request->get('descripcion');
        $topic->numero_tema = $request->get('numero_tema');
 
        if(Auth::check()){
            $topic->usuario_creador=$usuario;
            $topic->usuario_modificador= $usuario;
        }
        $topic->created_at = $hoy;
        $topic->updated_at = $hoy;
        $topic->save();

        flash('Se guardo de forma Correcta')->success();
        return Redirect::to('gestion/contenido/administracion/tema');

    }
    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
        $topic = Topic::findOrfail($id);
        return view("administration.university.topic.edit",["topic"=>$topic]);
    }
    public function update(TopicFormRequest $request, $id)
    {
        $topic = Topic::findOrfail($id);
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $topic->nombre=$request->get('nombre');
        $topic->descripcion=$request->get('descripcion');
        $topic->id_modulo=$request->get('id_modulo');
        if(Auth::check()){
            $topic->usuario_modificador= $usuario;
        }
        $topic->updated_at = $hoy;
        $topic->update();
        return Redirect::to('facultad/tema/'.$request->get('id_modulo'));
    }
    public function destroy($id)
    {
        Topic::destroy($id);
        flash('Se elimino de forma Correcta')->success();
        return Redirect::to('gestion/contenido/administracion/tema');
    }
}
