@extends('layouts.admin') 
@section('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-layout-grid3 bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Publicaciones</h4>
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
                        <li class="breadcrumb-item"><a href="#!" disabled>Publicaciones</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!--Publicaciones-->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card social-card">
                <div class="card-body text-center">
                    <h2 class="text-facebook m-b-20"><i class="icon-puzzle"></i></h2>
                    <h3 class="text-facebook f-w-700">{{$cantEjercicio->cantidad}}</h3>
                    <p>Ejercicios</p>
                    <a href="{{url('gestion/contenido/mis/publicaciones/ejercicios')}}" disabled>Ver más <i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card social-card">
                <div class="card-body text-center">
                    <h2 class="text-dribbble m-b-20"><i class="icon-graph"></i></h2>
                    <h3 class="text-dribbble f-w-700">{{$cantSoluciones->cantidad}}</h3>
                    <p>Soluciones</p>
                    <a href="{{url('gestion/contenido/mis/publicaciones/soluciones')}}" disabled>Ver más <i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card social-card">
                <div class="card-body text-center">
                    <h2 class="text-linkedin m-b-20"><i class="ti-cloud-up"></i></h2>
                    <h3 class="text-linkedin f-w-700">{{$cantUpdate->cantidad}}</h3>
                    <p>Archivos Subidos</p>
                    <a href="{{url('gestion/contenido/mis/publicaciones/archivos')}}" disabled>Ver más <i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card social-card">
                <div class="card-body text-center">
                    <h2 class="text-linkedin m-b-20"><i class="ti-write"></i></h2>
                    <h3 class="text-linkedin f-w-700">{{$cantTemporaryEvaluations->cantidad}}</h3>
                    <p>Evaluaciones</p>
                    <a href="#!" disabled>Ver más <i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

    </div>
                                          

@endsection