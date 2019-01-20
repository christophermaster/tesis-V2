@extends('layouts.admin') @section('contenido')

    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-layout-grid2-thumb bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Evaluación Generada</h4>
                        <span>Imprimir evaluación</span>
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
                        <li class="breadcrumb-item"><a href="#!">Evaluación Generada</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br> 
<div id="imprimir">
    <div  class="row text-center">
        <div class="col-12">
            <h4><b>Universidad De Carabobo</b></h4>
        </div>
        <div class="col-12">
            <h4><b>Facultad Experimental de Ciencias y Tecnología</b></h4>
        </div>
        <div class="col-12">
            <h4><b>Elementos Discretos I</b></h4>
        </div>

    </div>
    @if(count($todos) > 0)
        @if($ver == "1")
            <div class="col-12">
                <h5 for="">Parte Teorica</h5>
            </div>
            <hr>
        @else
            <div class="col-12">
                <h5 for="">Parte Practico</h5>
            </div>
            <hr>
        @endIf
            @foreach($todos as $pra)
                <div class="col-12">
                    <b>Ejercicio {{$loop->iteration}}</b>
                    <?php echo ($pra->contenido) ?>
                </div>
             @endforeach 
    @else 
    @if(count($teorico) > 0)
        <div class="col-12">
            <h5 for="">Parte Teorica</h5>
        </div>
        <hr>
        <div class="row">
            @foreach($teorico as $pra)
                <div class="col-6">
                   <b>Ejercicio {{$loop->iteration}}</b>  <?php echo $pra->contenido ?>
                </div>
             @endforeach 
        </div>
    @else
    <label for="">No posee Ejercicios Teoricos</label>  
    @endif

    @if(count($practico) > 0)
        <div class="col-12">
            <h5 for="">Parte Practico</h5>
        </div>
        <hr>
       
        <div class="row">
            @foreach($practico as $pra)
                <div class="col-12">
               <b>Ejercicio {{$loop->iteration}}</b> <?php echo $pra->contenido ?>
                </div>
             @endforeach 
        </div>
    @else
    <label for="">No posee Ejercicios Practicos</label>  
    @endif
@endif
</div>
<div class="text-center">
    <div class="row">
        <div class="col-6">
            <input type="button" class = "btn btn-primary" onclick="printDiv('imprimir')" value="Imprimir" />
        </div>
        <div class="col-6">
            <a type="button" class = "btn"  value="Imprimir luego" href="{{url('gestion/contenido/crear/evaluacion')}}">Imprimir Luego</a>
        </div>
    </div>
</div>


<script type="">

    function printDiv(nombreDiv){ 
        var contenido= document.getElementById(nombreDiv).innerHTML; 
        var contenidoOriginal= document.body.innerHTML;
        document.body.innerHTML = contenido; window.print(); 
        document.body.innerHTML = contenidoOriginal; 
    }

</script>
@endsection