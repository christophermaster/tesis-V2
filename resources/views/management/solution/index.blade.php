@if($ubication != 'Publication')
@foreach($solucion as $sol)
    <div class="col-xl-12 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h5 class="card-title">Solución {{$loop->iteration}}</h5>
                <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                            <li><a href ="{{URL::action('SolutionController@edit',[$ejer->id,$sol->id])}}"><i class="icon-pencil"></i></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal-delete-solution-{{$sol->id}}" rel="tooltip" title="Eliminar"><i class="feather icon-trash"></i></a></li>
                            <li> <i class="feather minimize-card icon-minus"></i></li>
                            <li><i class="feather icon-chevron-left open-card-option"></i></li>
                        </ul>
                </div>
            </div>
            <div class="card-block">
                <?php echo $sol->contenido ?>
            </div>
        </div>
    </div>
    @include('management.solution.modals.modal_delete_index')
@endforeach
@else
@extends('layouts.admin')
    @section('contenido')
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
                              <i class="ti-plus"></i> 
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
        @else
            @foreach($solucion as $sol)
                <div class="col-xl-12 col-md-12">
                    <div class="card latest-update-card">
                        <div class="card-header">
                            <h5 class="card-title">Solución {{$loop->iteration}}</h5>
                            <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                        <li><a href ="{{URL::action('SolutionController@edit',['0',$sol->id])}}"><i class="icon-pencil"></i></a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#modal-delete-solution-{{$sol->id}}" rel="tooltip" title="Eliminar"><i class="feather icon-trash"></i></a></li>
                                        <li> <i class="feather minimize-card icon-minus"></i></li>
                                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                    </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <?php echo $sol->contenido ?>
                        </div>
                    </div>
                </div>
                @include('management.solution.modals.modal_delete_index')
            @endforeach
        @endif
    @endsection
 @endif