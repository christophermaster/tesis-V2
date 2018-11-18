<?php

namespace Gestion\Http\Controllers;

use Illuminate\Http\Request;
use Gestion\models\Content;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class SelectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getContent(Request $request, $id){
    
        if($request->ajax()){
            $content = Content::contents($id);
            return response()->json($content);
        }
    }
}
