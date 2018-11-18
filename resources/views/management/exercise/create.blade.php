@extends('layouts.admin') @section('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icon-puzzle bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Crear Ejercicio</h4>
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
                        <li class="breadcrumb-item"><a href="#!">Crear Ejercicio</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="{{url('http://www.wiris.com/plugins/demo/ckeditor/php')}}" title="PHP">
    <input type="hidden" id="php_logo" class="wrs_tech_logo" alt="PHP"></a>

    <!--Manejador de Errores -->

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">

            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        
            @endif
        </div>
    </div>

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
                            <select id="topic" name="id_tema" class="form-control miInput" 
                            data-style="select-with-transition" title="Facultad" data-size="7" required>
                                <option value>Seleccione...</option>
                            
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="exampleFormControlSelect2" class="milabel">Contenido</label>
                            <select id="content" name="id_contenido" class="form-control miInput" 
                            data-style="select-with-transition" title="Escuela" data-size="7" required>
                                <option value>Seleccione...</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="exampleFormControlSelect2" class="milabel">Tipo Ejercicio</label>
                            <select id="cathdra" name="id_tipo" class="form-control miInput" 
                            data-style="select-with-transition" title="Escuela" data-size="7" required>
                                <option value>Seleccione...</option>
                            
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="exampleFormControlSelect2" class="milabel">Dificultad</label>
                            <select id="dificultad" name="id_dificultad"  data-style="select-with-transition" 
                            class="form-control miInput" data-style="select-with-transition" title="Escuela" 
                            data-size="7" required>
                                <option value>Seleccione...</option>
                            
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
                    <textarea name="contenido" id="example" requerid value="{{old('contenido')}}" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="true" role="textbox" 
                    aria-label="Rich Text Editor, example" title="Rich Text Editor, example" required>
                    </textarea>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    <!-- <button class="btn btn-primary" type="submit">Guardar y Agregar Solucion </button>-->
                    </div>
                </div>   
            </div>
        </div>
    </div>

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

<!--
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-text card-header-primary">
                <div class="card-text">
                    <h4 class="card-title">Ejercicio y Solución</h4>
                    <p class="card-category">formulario para la creacion de ejercicio</p>
                </div>
            </div>
            <div class="card-body">
                <div class="page-categories">
                    <h3 class="title text-center">Contenido</h3>
                    <br />
                    <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#link7" role="tablist">
                                <i class="material-icons">description</i> Ejercicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#link8" role="tablist">
                                <i class="material-icons">extension</i> Solución
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tab-space tab-subcategories adjoined-bottom">
                        <div class="tab-pane active grid-container" id="link7">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="contenido" id="example" requerid value="{{old('contenido')}}" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="true" role="textbox" aria-label="Rich Text Editor, example" title="Rich Text Editor, example">
                                      </textarea>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="link8">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name ="contenidoB" id="exampleA"  contenteditable="true" tabindex="0" spellcheck="true" role="textbox" aria-label="Rich Text Editor, exampleA" title="Rich Text Editor, exampleA">
                                     
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>


    <!--TODO ELIMINAR CUANDO TERMINE LA PANTALLA 
    
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
-->