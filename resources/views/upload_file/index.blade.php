@extends('layouts.admin') @section('contenido')

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-upload-cloud bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Archivos Subidos</h5>
                        <span>Gestion de contenido y evaluaciones</span>
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
                            <a href="#!">Archivos Subidos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Buscador-->
     @include('upload_file.search.search')

<hr>


<div class="container">
    <div class="row">
        @foreach($upload as $upl)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 cardCenter">
                <div class="card social-card ">
                    <div class="card-header">
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                            <li><a href ="{{route('downloadFile',['id' => $upl->id])}}">
                                <i class="ti-cloud-down"></i></a>
                            </li>
                            <li><a href="#" data-toggle="modal" data-target="#modal-show-{{$upl->id}}"><i class="feather icon-eye"></i></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal-delete-{{$upl->id}}" rel="tooltip" title="Eliminar"><i class="feather icon-trash"></i></a></li>
                            <li>
                            <form method="post" action="/favorito/archivos/{{$upl->id}}">
                                @csrf
                                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                    <button class="noFavorito" type="submit" rel="tooltip" title="Agregar a favoritos">
                                     <i class="feather icon-heart"></i>
                                    </button>
                            </form>
                            </li>
                            <li><i class="feather icon-chevron-left open-card-option"></i></li>
                        </ul>
                    </div>
                    </div>
                    <div class="card-body text-center">
                        @if($upl->tipo_archivo == "application/pdf" )
                             <h2 class="text-dribbble m-b-20"><i  class="fa fa-file-pdf-o"></i></h2>
                        @elseif($upl->tipo_archivo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" )
                             <h2 class="text-facebook m-b-20"><i class="fa fa-file-word-o"></i></h2>
                        @elseif($upl->tipo_archivo == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $upl->tipo_archivo == "application/vnd.ms-excel" )
                             <h2 class="text-facebook m-b-20"><i class="fa fa-file-excel-o"></i></h2>
                        @elseif($upl->tipo_archivo == "application/zip, application/x-compressed-zip" )
                             <h2 class="text-facebook m-b-20"><i class="fa fa-file-zip-o"></i></h2>
                        @elseif($upl->tipo_archivo == "application/vnd.ms-powerpointtd>" ||$upl->tipo_archivo == "application/vnd.openxmlformats-officedocument.presentationml.presentation"  )
                             <h2 class="text-facebook m-b-20"><i class="fa fa-file-powerpoint-o"></i></h2>
                        @elseif($upl->tipo_archivo == "image/jpeg" || $upl->tipo_archivo == "image/png"  )
                             <h2 class="text-facebook m-b-20"><i class="fa fa-file-image-o"></i></h2>
                        @else
                        <h2 class="text-facebook m-b-20"><i class="fa fa-file"></i></h2>
                        @endif
                       
                        <h3 class="text-facebook f-w-700"></h3>
                        <p>{{$upl->titulo}}</p>
                    </div>
                </div>
            </div>
            @include('upload_file.modals.modal_delete_index')
            @include('upload_file.modals.modal_show_index')
        @endforeach
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal modall">
  <span id ="close" class="close">&times;</span>
  <img class="modal-content cont" id="img01">
  <div id="caption"></div>
</div>


<script>
    function ampliar(id){
        console.log(id);
        var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById(id);
        var a = document.getElementById('a'+id);
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    }  
</script>
<script>
        // Get the <span> element that closes the modal
   // var span = document.getElementsByClassName("close")[0];
    var span = document.getElementById('close');
    var modal = document.getElementById('myModal');
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
</script>
<style>
body {font-family: Roboto,sans-serif;}

.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
.cfooter{
  margin: 0px 160px 12px !important;  

}
.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modall {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
.miScrool{

    padding-right: 12px;
    font-size: 13px;
    overflow: hidden;
    position: relative;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.ctitulo{
    overflow: hidden; 
    text-overflow: ellipsis;
}
.cardCenter{
    text-align: -webkit-center;
}

/* Modal Content (image) */
.cont {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

@endsection