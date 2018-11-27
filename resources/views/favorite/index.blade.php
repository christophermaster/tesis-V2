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
                <div class="tab-pane" id="messages7" role="tabpanel">
                    <br>
                    <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                </div>
                <div class="tab-pane" id="settings7" role="tabpanel">
                    <br>
                   <div class="container">
                        <div class="row">
                            @foreach($upload as $upl)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 cardCenter">
                                    <div class="card social-card ">
                                        <div class="card-header">
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                                <li><a href ="{{route('downloadFile',['id' => $upl->id])}}">
                                                    <i class="ti-cloud-down"></i></a>
                                                </li>
                                                <li><a href="#" data-toggle="modal" data-target="#modal-show-{{$upl->id}}"><i class="feather icon-eye"></i></a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#modal-delete-{{$upl->id}}" rel="tooltip" title="Eliminar"><i class="feather icon-trash"></i></a></li>
                                                <li>
                                                <form method="post" action="/favorito/archivos/{{$upl->id}}">
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
                                        <div class="card-body text-center">
                                            @if($upl->tipo_archivo == "application/pdf" )
                                                <h2 class="text-dribbble m-b-20"><i  class="fa fa-file-pdf-o"></i></h2>
                                            @elseif($upl->tipo_archivo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" )
                                                <h2 class="text-facebook m-b-20"><i class="fa fa-file-word-o"></i></h2>
                                            @elseif($upl->tipo_archivo == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $upl->tipo_archivo == "application/vnd.ms-excel" )
                                                <h2 class="text-facebook m-b-20"><i class="fa fa-file-excel-o"></i></h2>
                                            @elseif($upl->tipo_archivo == "application/zip, application/x-compressed-zip" )
                                                <h2 class="text-facebook m-b-20"><i class="fa fa-file-zip-o"></i></h2>
                                            @elseif($upl->tipo_archivo == "application/vnd.ms-powerpointtd>" ||$upl->tipo_archivo == "application/vnd.openxmlformats-officedocument.presentationml.presentation"  )
                                                <h2 class="text-facebook m-b-20"><i class="fa fa-file-powerpoint-o"></i></h2>
                                            @elseif($upl->tipo_archivo == "image/jpeg" || $upl->tipo_archivo == "image/png"  )
                                                <h2 class="text-facebook m-b-20"><i class="fa fa-file-image-o"></i></h2>
                                            @else
                                            <h2 class="text-facebook m-b-20"><i class="fa fa-file"></i></h2>
                                            @endif
                                        
                                            <h3 class="text-facebook f-w-700"></h3>
                                            <p>{{$upl->titulo}}</p>
                                        </div>
                                    </div>
                                </div>
                                @include('upload_file.modals.modal_delete_index')
                                @include('upload_file.modals.modal_show_index')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                          

@endsection