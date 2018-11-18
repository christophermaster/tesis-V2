@extends('layouts.admin')
 @section('contenido')

    <!--boon de atras-->
    <div class="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="{{ URL::previous() }}"><i class="material-icons">
                arrow_back</i>Atras</a></li>
            </ol>
        </nav>
    </div>

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
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
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
                        <li><i class="icon-pencil"></i></li>
                        <li><i class="feather icon-trash close-card"></i></li>
                        <li><i class="feather icon-heart"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card-block">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row miform">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Tema: </label><p></p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Contenido: </label><p></p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Tipo: </label><p></p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Dificultad: </label><p></p>
                        </div>
                    </div>
                    <div class="row miform">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Usuario Creador: </label><p></p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Usuario Modificador : </label><p></p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Fecha de Creación: </label><p></p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Fecha de Modificación: </label><p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h5 class="card-title">Descripción</h5>
            </div>
            <div class="card-block">
            </div>
            
        </div>
    </div>
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
        </div>
    </div>

    <!--Soluciones-->
    <div class="col-xl-12 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h5 class="card-title">Solución-1</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="icon-pencil"></i></li>
                        <li><i class="feather icon-trash close-card"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
            </div>
            
        </div>
    </div>

@endsection