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
                <h5>Mis Evaluaciones</h5>
            </div>
            <div class="col-lg-4 text-right">
               <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create-evaluation">
                    Crear Evaluación
               </button>
            </div>
        </div>
        <hr>
    </div>
@if(count($temporaryEvaluation)>0)
<div class="row">
    @foreach($temporaryEvaluation as $tem)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    @if($tem->id_tipo == 1)
                        <h5 class="card-title">Parcial {{$tem->id}}</h5>
                    @elseif($tem->id_tipo == 2)
                        <h5 class="card-title">Quiz {{$tem->id}}</h5>
                    @else
                        <h5 class="card-title">Actividad {{$tem->id}}</h5>
                    @endif
                    <h6 class="card-subtitle mb-2 text-muted">{{$tem->tema}}</h6>
                    <p class="card-text">{{$tem->fecha}}</p>
                    <a href="{{url('gestion/contenido/ver/evaluacion/')}}/{{$tem->id}}" class="card-link">ver</a>
                </div>
            
            </div>
    </div>
    @endforeach
</div>
@else
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h4>No tienes evaluaciones Realizadas</h4>
        </div>
    </div>
@endif

    @include('management.evaluation.modals.modal_create_evaluation')
@endsection
