@extends('layouts.admin') @section('contenido')
<!-- [ breadcrumb ] start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ti-layout-grid2-thumb bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Generar Evaluación</h4>
                    <span>Seleccione los ejercicios</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('gestion/contenido')}}"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('gestion/contenido/crear/evaluacion')}}">Crear Evaluación</a></li>
                    <li class="breadcrumb-item"><a href="#!">Generar</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="container">
        {!!Form::open(array('url'=>'gestion/contenido/pdf/manual','method'=>'GET','autocomplete'=>'off','files'=>'true'))!!} {{Form::token()}}
        <div class="table-responsive">
            <table id="examplee" class="table table-striped table-bordered " style="width:100%">
                <thead>
                    <tr>
                        @if(count($todos)>0)
                            <th>Seleccione</th>
                            <th>Ejercicios</th>
                        @else
                            <th>Seleccione</th>
                            <th>Ejercicios</th>
                            <th>Tipo</th>
                        @endIf
                    </tr>
                </thead>
                <tbody>
                @if(count($todos)>0)
                    @foreach($todos as $tod)
                    <tr>
                        <td WIDTH="50"><input type="checkbox" name="id[]" value="{{$tod->id}}"></td>
                        <td>
                            <?php echo $tod->contenido ?>
                        </td>
                    </tr>
                    @endforeach
                @else
                     @foreach($teorico as $teo)
                        <tr>
                            <td WIDTH="50"><input type="checkbox" name="id[]" value="{{$teo->id}}"></td>
                            <td>
                                <?php echo $teo->contenido ?>
                            </td>
                            <td WIDTH="50">{{$teo ->tipo_nombre}}</td>
                        </tr>
                    @endforeach
                    @foreach($practico as $pracs)
                        <tr>
                            <td WIDTH="50"><input type="checkbox" name="id[]" value="{{$pracs->id}}"></td>
                            <td>
                                <?php echo $pracs->contenido ?>
                            </td>
                            <td WIDTH="50">{{$pracs ->tipo_nombre}}</td>
                        </tr>
                    @endforeach
                    @endIf
                </tbody>
                    <tfoot>
                    <tr>
                        @if(count($todos)>0)
                            <th>Seleccione</th>
                            <th>Ejercicios</th>
                            
                        @else
                            <th>Seleccione</th>
                            <th>Ejercicios</th>
                            <th>Tipo</th>
                        @endIf
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="tipo" value="{{ $tipo }}">
<input type="hidden" name="dificultad" value="{{ $dificultad }}">
<input type="hidden" name="ver" value="{{ $ver }}">
<input type="hidden" name="evaluacion" value="{{ $evaluacion }}">
<input type="hidden" name="tema" value="{{ $tema }}">
<input type="hidden" name="cantA" value="{{ $cantA }}">
<input type="hidden" name="cantB" value="{{ $cantB }}">
<div class="text-center">
    <div class="row">
        <div class="col-6">
            <input type="submit" class = "btn btn-primary" value="Guardar para imprimir"/>
        </div>
        <div class="col-6">
            <a type="button" class = "btn"  value="Cancelar" href="{{url('gestion/contenido/crear/evaluacion')}}">Imprimir Luego</a>
        </div>
    </div>
</div>
{{Form::Close()}}
 @endsection