@extends('layouts.admin') @section('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-write bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Modificar Ejercicio</h4>
                        <span>Gestión de Contenido y Evaluaciones</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Ejercicios</a> </li>
                        <li class="breadcrumb-item"><a href="#!">Modificar Ejercicio</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="{{url('http://www.wiris.com/plugins/demo/ckeditor/php')}}" title="PHP">
    <input type="hidden" id="php_logo" class="wrs_tech_logo" alt="PHP"></a>

     {!!Form::model($ejercicio,['method'=>'PATCH','route'=>['ejercicio.update',$ejercicio->id],'files'=>'true'])!!}
     {{Form::token()}}
        <!--Destalles-->
        <div class="col-xl-12 col-md-12">
            <div class="card latest-update-card">
                <div class="card-header">
                    <h5 class="card-title">Detalles</h5>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row miform">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleFormControlSelect2" class="milabel">Tema</label>
                                <select id="topic" name="tema" class="form-control miInput" 
                                data-style="select-with-transition" title="Tema" data-size="7" required>                                            
                                    @foreach($tema as $tema)
                                    @if($tema->id == $ejercicio->id_tema)
                                        <option value="{{$tema->id}}" selected>{{$tema->nombre}}</option>
                                    @else
                                        <option value="{{$tema->id}}">{{$tema->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleFormControlSelect2" class="milabel">Contenido</label>
                                <select id="content" name="contenido" class="form-control miInput" 
                                data-style="select-with-transition" title="Escuela" data-size="7" required>
                                    @foreach($contenido as $contenido)
                                    @if($contenido->id == $ejercicio->id_contenido)
                                    <option value="{{$contenido->id}}" selected>{{$contenido->nombre}}</option>
                                    @else
                                    <option value="{{$contenido->id}}">{{$contenido->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleFormControlSelect2" class="milabel">Tipo Ejercicio</label>
                                <select id="tipo" name="tipo" class="form-control miInput" 
                                data-style="select-with-transition" title="Escuela" data-size="7" required>
                                    @foreach($tipo as $tipo)
                                    @if($tipo->id == $ejercicio->id_tipo)
                                    <option value="{{$tipo->id}}" selected>{{$tipo->nombre}}</option>
                                    @else
                                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleFormControlSelect2" class="milabel">Dificultad</label>
                                <select id="dificultad" name="dificultad"  data-style="select-with-transition" 
                                class="form-control miInput" data-style="select-with-transition" title="Escuela" 
                                data-size="7" required>
                                    @foreach($dificultad as $dificultad)
                                    @if($dificultad->id == $ejercicio->id_dificultad)
                                    <option value="{{$dificultad->id}}">{{$dificultad->nombre}}</option>
                                    @else
                                    <option value="{{$dificultad->id}}" selected>{{$dificultad->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                    <?php echo $ejercicio->contenido ?>
                    
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
<script>
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@endsection