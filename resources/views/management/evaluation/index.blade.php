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
