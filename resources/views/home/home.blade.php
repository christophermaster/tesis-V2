@extends ('layouts.admin')
@section ('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Inicio</h5>
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
                        <li class="breadcrumb-item"><a href="#!">Inicio</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!--Contenido-->
    <div class="card">
        <div class="card-header">
            <h5>Repositorio de la Facultad de Ciencias y Tecnologías</h5>
        </div>
        <div class="card-block">
            <div class="row" id="draggablePanelList">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <div class="card-sub">
                    <img class="card-img-top img-fluid" src="{{asset('images/card-2.jpg')}}" 
                    width="400" height="300" alt="Card image cap">
                        <div class="card-block">
                        <h5  class="card-title text-center">
                            <a href="">
                                 <b>Repositorio de material digitalizado</b>
                            </a>
                        </h5>
                        <p class="card-description text-center">
                            Reúne los contenidos digitales producidos por la comunidad 
                            universitaria resultantes de su actividad docente,
                            investigadora e institucional.
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <div class="card-sub">
                        <img class="card-img-top img-fluid"  src="{{asset('images/card-3.jpg')}}"  width="400" height="300" alt="Card image cap">
                        <div class="card-block">
                        <h5 class="card-title text-center">
                            <a href="">
                                <b>Repositorio de Ejercicios y Soluciones</b>
                            </a>
                        </h5>
                        <p class="card-description text-center">
                            Reúne los ejercicios y su soluciones producidas por la 
                            comunidad docente de la institución universitaria de la Facyt.
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <div class="card-sub">
                        <img class="card-img-top img-fluid" src="{{asset('images/card-1.jpg')}}"  width="400" height="300" alt="Card image cap">
                        <div class="card-block">
                        <h5 class="card-title text-center">
                            <a href="">
                                 <b>Repositorio de Evaluaciones</b>
                            </a>
                        </h5>
                        <p class="card-description text-center">
                            Reúne las evaluaciones producidas 
                            por la comunidad docente de la 
                            institución universitaria de la Facyt.
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

