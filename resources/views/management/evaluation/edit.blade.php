@extends('layouts.admin') @section('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-write bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Modificar Solución</h4>
                        <span>Gestión de Contenido y Evaluaciones</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('gestion/contenido')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            @if($id != 0)
                              <a href="{{URL::action('ExerciseController@show',$id)}}">Ejercicio</a>
                            @else
                             <a href="{{URL::action('PublicationController@mySolution')}}">Soluciones</a>
                            @endif
                            
                         </li>
                        <li class="breadcrumb-item"><a href="#!">Modificar solución</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="{{url('http://www.wiris.com/plugins/demo/ckeditor/php')}}" title="PHP">
    <input type="hidden" id="php_logo" class="wrs_tech_logo" alt="PHP"></a>


  {!!Form::model($solucion,['method'=>'PATCH','route'=>['solucion.update',$id,$solucion->id],'files'=>'true'])!!}
  {{Form::token()}}
    <br>
    <!--CkEditor-->                                         
    <div class="col-xl-12 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                 <h5 class="card-title">Ejercicio</h5>
                  <p class="card-category">Teorico ó Practico </p>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="form-group">
                    <textarea name="descripcion" id="example" requerid value="{{old('descripcion')}}" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="true" role="textbox" 
                    aria-label="Rich Text Editor, example" title="Rich Text Editor, example" required>
                    <?php echo $solucion->contenido ?>
                    
                    </textarea>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <a href="{{ URL::previous()}}">
                            <button class="btn btn-danger">Cancelar</button>
                        </a>
                    <!-- <button class="btn btn-primary" type="submit">Guardar y Agregar Solucion </button>-->
                    </div>
                </div>   
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    <!--Wirelis-->
    <div class="row">


        <!--TODO ELIMINAR CUANDO TERMINE LA PANTALLA 
        -->
        <div class="wrs_row wrs_padding" style="display:none">
            <div class="wrs_col wrs_s12">
                <div id="container_tab">
                    <div id="content_tab">
                        <div class="wrs_div_box wrs_preview" id="preview_div">
                        </div>
                        <div class="wrs_div_box wrs_preview wrs_code" id="htmlcode_div" style="display:none;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="options" style="direction: ltr;" style="display:none">
            <div class="wrs_row wrs_padding">
                <div class="wrs_col wrs_s12 wrs_m6">
                    <div class="wrs_row wrs_padding_small">
                        <div class="wrs_col wrs_xs1">
                            <input type="hidden" id="advanced_options_checkbox" onclick="advancedOptions()" />
                        </div>
                    </div>
                </div>
            </div>
            <div id="advanced_options" style="display:none">
            </div>
        </div>
    </div>
@endsection