@extends('layouts.admin') @section('contenido')
<div id="imprimir">
    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-layout-grid2-thumb bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Visualización de los Ejercicios</h4>
                        <span>Ejercicios Resultante</span>
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
                        <li class="breadcrumb-item"><a href="#!">Ejercicios resultantes</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br> 
    @if(count($todos) > 0)
        @if($ver == "1")
            <h4 for="">Teorico</h4>
        @else
            <h4 for="">Practico</h4>
        @endIf
        <hr>
         @foreach($todos as $todo)
            <div class="col-xl-12 col-md-12">
                <div class="card latest-update-card">
                    <div class="card-header">
                        <h6 class="card-title">Ejercicio {{$loop->iteration}}</h6>
                    </div>
                    <div class="card-block">
                        <?php echo $todo->contenido ?>
                    </div>
                </div>
            </div>
        @endforeach 
    @else 
    @if(count($teorico) > 0)

        <h4 for="">Teorico</h4>
        @foreach($teorico as $teo)
            <div class="col-xl-12 col-md-12">
                <div class="card latest-update-card">
                    <div class="card-header">
                        <h6 class="card-title">Ejercicio Teorico {{$loop->iteration}}</h6>
                    </div>
                    <div class="card-block">
                        <?php echo $teo->contenido ?>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <label for="">No posee Ejercicio Teorico</label> 
    @endif 

    @if(count($practico) > 0)
        <h4 for="">Practico</h4>
        @foreach($practico as $pra)
            <div class="col-xl-12 col-md-12">
                <div class="card latest-update-card">
                    <div class="card-header">
                        <h6 class="card-title">Ejercicio Practico {{$loop->iteration}}</h6>
                    </div>
                    <div class="card-block">
                        <?php echo $pra->contenido ?>
                    </div>
                </div>
            </div>
        @endforeach 
        @else
        <label for="">No posee Ejercicios Practicos</label> 
        @endif 
    @endif
</div>
{!!Form::open(array('url'=>'gestion/contenido/pdf','method'=>'GET','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}

    <input type="hidden" name="tipo" value="{{ $tipo }}">
    <input type="hidden" name="dificultad" value="{{ $dificultad }}">
    <input type="hidden" name="ver" value="{{ $ver }}">
    <input type="hidden" name="evaluacion" value="{{ $evaluacion }}">
    <input type="hidden" name="tema" value="{{ $tema }}">
    <input type="hidden" name="cantA" value="{{ $cantA }}">
    <input type="hidden" name="cantB" value="{{ $cantB }}">
    @if(count($todos) > 0)
        <input type="hidden" name="a[]" value="{{ $todos }}">
    @else
        <input type="hidden" name="a[]" value="">
    @endif
    @if(count($teorico) > 0)
        <input type="hidden" name="b[]" value="{{ $teorico }}">
    @else
        <input type="hidden" name="b[]" value="">
    @endif
    @if(count($practico) > 0)
        <input type="hidden" name="c[]" value="{{ $practico }}">
    @else
        <input type="hidden" name="c[]" value="">
    @endif
    <div class="text-center">
        <div class="row">
            <div class="col-4">
                <button type="submit" class ="btn btn-primary">Guardar para imprimir</button>
            </div>
            <div class="col-4">
                <input type="boton" class ="btn btn-info" value="Refrescar" onclick="javascript:window.location.reload();"/>
            </div>
            <div class="col-4">
                <a type="button"  class ="btn btn-danger"  href="{{url('gestion/contenido/crear/evaluacion')}}">Cancelar</a>     
            </div>
        </div>
    </div>
    
{{Form::Close()}}

@endsection