@extends('layouts.admin')
 @section('contenido')
    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-receipt bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Detalles</h4>
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
                        <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Ejercicios</a></li>
                        <li class="breadcrumb-item"><a href="#!">Detalles</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Destalles-->
    <div class="col-xl-12 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h5 class="card-title">Información</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><a href ="{{URL::action('ExerciseController@edit', $ejer->id)}}"><i class="icon-pencil"></i></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal-delete-{{$ejer->id}}" rel="tooltip" title="Eliminar"><i class="feather icon-trash"></i></a></li>
                        <li>
                            <form method="post" action="/favorito/ejer/{{$ejer->id}}">
                                @csrf
                                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                    <button class="noFavorito" type="submit" rel="tooltip" title="Agregar a favoritos">
                                        <i class="feather icon-heart"></i>
                                    </button>
                            </form>
                        </li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card-block">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row miform">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for=""><b>Tema:</b> </label>
                            <p>{{$ejer->tema}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for=""><b>Contenido:</b></label>
                            <p>{{$ejer->nombre_contenido}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for=""><b>Tipo:</b></label>
                            <p>{{$ejer->tipo_nombre}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for=""><b>Dificultad:</b></label>
                            <p>{{$ejer->dificultad}}</p>
                        </div>
                    </div>
                    <div class="row miform">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for=""><b>Usuario Creador:</b></label>
                            <p>{{$ejer->usuario_creador}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for=""><b>Usuario Modificador :</b></label>
                            <p>{{$ejer->usuario_modificador}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for=""><b>Fecha de Creación:</b></label>
                            <p>{{$ejer->created_at}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for=""><b>Fecha de Modificación:</b></label>
                            <p>{{$ejer->updated_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h5 class="card-title">Descripción</h5>
            </div>
            <div class="card-block">
                <p class="text-justify">
                    <?php echo $ejer->contenido ?>
                </p>
            </div>
            
        </div>
    </div>
    @include('management.exercise.modals.modal_delete_index')
    <br>
    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-layout-grid2-thumb bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Soluciones</h4>
                        <span>Descripción de las soluciones </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href ="{{URL::action('SolutionController@create', $ejer->id)}}"><i class="ti-plus"></i> Crear solución</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if(count($solucion) == 0)
    <hr>
    <div class="col-xl-12 col-md-12 text-center">
        <h6>No posee soluciones asociadas</h6>
    </div>
    @endif

    <!--Soluciones-->
    @include('management.solution.index')
@endsection