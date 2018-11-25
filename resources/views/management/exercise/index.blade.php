@extends('layouts.admin') 
@section('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="page-header-title">
                    <i class="feather icon-list bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Listado Ejercicios</h4>
                        <span>Gestión de Contenido y Evaluaciones</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('gestion/contenido')}}"><i class="feather icon-home"></i></a>
                        </li>
                        @if($ubication == "Home")
                        <li class="breadcrumb-item"><a href="#!">Ejercicios</a> </li>
                        @elseif($ubication == "Publication")
                        <li class="breadcrumb-item"><a href="{{url('gestion/contenido/mis/publicaciones')}}">Mis publicaciones</a></li>
                        <li class="breadcrumb-item"><a href="#!">Ejercicios</a> </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Buscador-->
     @include('management.exercise.search.search')

    <br>

    <div class="col-xl-12 col-md-12 buscador">
        <div class=" col-xl-4 col-md-4 ">

            <a href="{{url('gestion/contenido/ejercicio/create')}}">
                <i class="feather icon-plus open-card-option"> Crear ejercicio</i>
            </a>

        </div>
    </div>

    <hr>
    @foreach($ejercicio as $ejer)
        <!--Listado de los ejers-->
        <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card latest-update-card">
                <div class="card-header">
                    <h5 style=" display: inline;">{{$ejer->tema}}-</h5><p style=" display: inline;">{{$ejer->nombre_contenido}}</p>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                            <li><a href ="{{URL::action('ExerciseController@show', $ejer->id)}}"><i class="feather icon-eye"></i></a></li>
                            <li><a href ="{{URL::action('ExerciseController@edit', $ejer->id)}}"><i class="icon-pencil"></i></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal-delete-{{$ejer->id}}" rel="tooltip" title="Eliminar"><i class="feather icon-trash"></i></a></li>
                            <li>
                            <form method="post" action="/favorito/ejercicio/{{$ejer->id}}">
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
                    <div class="card-block">
                        <div class="scroll">
                            <br>
                        <article>  <?php echo $ejer->contenido ?></article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @include('management.exercise.modals.modal_delete_index')
    @endforeach
    <div class="text-center paginador">
        <div class="col-md-12">
            {{$ejercicio->render()}}
        </div>
    </div>
@endsection