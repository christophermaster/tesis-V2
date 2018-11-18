@extends('layouts.admin') 
@section('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-list bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Listado Ejercicios</h4>
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
                        <li class="breadcrumb-item"><a href="#!">listado Ejercicio</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Buscador-->
    <div class="col-xl-12 col-md-12 buscador">
        <div class=" col-xl-4 col-md-4 ">
            <div class="input-group ">
                <input type="text" class="form-control" placeholder="Buscar">
                <span class="input-group-append search-btn">
                    <i class="feather icon-search input-group-text"></i>
                </span>
            </div>
        </div>
    </div>

    <br>

    <div class="col-xl-12 col-md-12 buscador">
        <div class=" col-xl-4 col-md-4 ">

            <a href="">
                <i class="feather icon-plus open-card-option"> Crear ejercicio</i>
            </a>

        </div>
    </div>

    <hr>

    <!--Listado de los ejercicios-->
    <div class="col-xl-12 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h5>What’s New</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-eye"></i></li>
                        <li><i class="icon-pencil"></i></li>
                        <li><i class="feather icon-trash close-card"></i></li>
                        <li><i class="feather icon-heart"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
                <div class="card-block">
                    <div class="scroll">
                        hola <br><br>hola <br><br>hola <br><br>hola <br><br>hola <br><br>hola <br><br>hola <br><br>ç
                        hola <br><br>hola <br><br>hola <br><br>hola <br><br>hola <br><br>hola <br><br>hola <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection