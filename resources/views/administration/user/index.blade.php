@extends('layouts.admin') 
@section('contenido')

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="page-header-title">
                    <i class="ti-user bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Administración de Usuarios</h5>
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
                        <li class="breadcrumb-item"><a href="#!">Administraccion de Usuarios</a> </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!--Buscador-->
    @include('administration.user.search.search')

    <div class="text-right">
        <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <a href="#" data-toggle="modal" data-target="#modal-create" rel="tooltip" title="Ver">
            <i class="fa fa-user-plus"></i> Agregar
            </a>
        </div>
        <hr>
    </div>
     @include('administration.user.modals.modal_create')
    <div class = "row">
        <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="card">
                <div class="card-header">

                </div>

                <div class="card-body">
                    <div class= "table-responsive">
                        <table class= "table table-striped table-bordered table-hover text-center">
                            <thead>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Cargo</th>
                                <th>Materia</th>
                                <th>Opciones</th>
                            </thead>
                            @foreach($user as $us)
                                <tr>

                                    <td>{{$us ->nombre}}</td>
                                    <td>{{$us ->apellido}}</td>
                                    <td>{{$us ->cedula}}</td>
                                    <td>{{$us ->name}}</td>
                                    <td>{{$us ->email}}</td>
                                    <td>{{$us ->cargo}}</td>
                                    <td>{{$us ->materia}}</td>
                                    <td class="td-actions">
                                        <a href="#" rel="tooltip" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#modal-delete-{{$us->id}}" rel="tooltip" title="Eliminar">
                                           <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('administration.user.modals.modal_delete_index')
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="text-center">
                    {{$user ->render()}}
                </div>
                
            </div>  
        </div>
    </div>

@endsection