@extends('layouts.admin') 
@section('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-heart bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Favoritos</h4>
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
                        <li class="breadcrumb-item"><a href="#!" disabled>Favoritos</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Favorites-->
    <!-- Row start -->
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <!-- <h6 class="sub-title">Tab With Icon</h6> -->
          
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs " role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home7" role="tab">
                        <i class="icon-puzzle margin-icon"></i>Ejercicios</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile7" role="tab">
                        <i class="margin-icon icon-graph"></i>Soluciones</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages7" role="tab">
                        <i class="ti-write margin-icon"></i>Parciales</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings7" role="tab">
                        <i class="icofont icon-paper-clip margin-icon"></i>Archivos</a>
                    <div class="slide"></div>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content container ">
                <!--Ejercicios -->
                <div class="tab-pane active" id="home7" role="tabpanel">
                    <br>
                    @foreach($ejercicio as $ejer)
                        <!--Listado de los ejers-->
                        <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
                            <div class="card latest-update-card">
                                <div class="card-header">
                                    <h5 style=" display: inline;">{{$ejer->tema}}-</h5><p style=" display: inline;">{{$ejer->nombre_contenido}}</p>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                            <li><i class="feather icon-eye"></i></li>
                                            <li><i class="icon-pencil"></i></li>
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
                       
                        @include('management.exercise.modals.modal_delete_index')
                    @endforeach
                    <div class="text-center paginador">
                        <div class="col-md-12">
                            {{$ejercicio->render()}}
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile7" role="tabpanel">
                    <br>
                    <p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                </div>
                <div class="tab-pane" id="messages7" role="tabpanel">
                    <br>
                    <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                </div>
                <div class="tab-pane" id="settings7" role="tabpanel">
                    <br>
                    <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                </div>
            </div>
        </div>
    </div>
                                          

@endsection