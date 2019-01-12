@extends('layouts.admin')
 @section('contenido')

<div class="page-header card">
<div class="row align-items-end">
    <div class="col-lg-6">
        <div class="page-header-title">
            <i class="fa fa-sticky-note-o bg-c-blue" aria-hidden="true"></i>
            <div class="d-inline">
                <h5>Administracción de Contenidos</h5>
                <span>Gestion de contenido y evaluaciones</span>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="page-header-breadcrumb">
            <ul class=" breadcrumb breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{url('gestion/contenido')}}"><i class="feather icon-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{url('gestion/contenido/administracion/tema')}}">Administracción de Temas</a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Contenido</a> </li>
            </ul>
        </div>
    </div>
</div>
</div>

<br>
<!--Buscador-->
@include('administration.university.content.search')

<div class="text-right">
<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
    <a href="#" data-toggle="modal" data-target="#modal-create" rel="tooltip" title="Ver">
    <i class="fa fa-plus"></i> Agregar
    </a>
</div>
<hr>
</div>
@include('administration.university.content.modals.modal_create')
  
<div class = "row">
    <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
         <div class="card">
            <div class="card-header">
                <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                </div>          
            </div>
             <div class="card-body">
                <div class= "table-responsive">
                        <table class= "table table-striped table-bordered table-hover text-center">
                            <thead>

                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Usuario Creador</th>
                                <th>Usuario Modificador</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Modificación</th>
                                <th>Opciones</th>

                            </thead>

                            @foreach($content as $con)
                                <tr>
                                    <td>{{$con ->id}}</td>
                                    <td>{{$con ->nombre}}</td>
                                    <td>{{$con ->descripcion}}</td>
                                    <td>{{$con ->usuario_creador}}</td>
                                    <td>{{$con ->usuario_modificador}}</td>
                                    <td>{{$con ->created_at}}</td>
                                    <td>{{$con ->updated_at}}</td>
                                    <td class="td-actions">
                                        <a href="#" rel="tooltip" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#modal-delete-{{$con->id}}" rel="tooltip" title="Eliminar">
                                           <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('administration.university.content.modal')
                            @endforeach


                        </table>
                </div>
             </div>
         </div>
         <div class="text-center">
            {{$content ->render()}}
         </div>
      
    </div>
</div> 

@endsection

