@extends('layouts.admin') @section('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-layout-grid2-thumb bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Crear Evaluación</h4>
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
                        <li class="breadcrumb-item">
                            <a href="">Crear Evaluación</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <h5>Evaluaciones Pendientes</h5>
            </div>
            <div class="col-lg-4 text-right">
               <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create-evaluation">
                    Crear Evaluación
               </button>
            </div>
        </div>
        <hr>
    </div>
    @include('management.evaluation.modals.modal_create_evaluation')
@endsection
