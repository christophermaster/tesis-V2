@extends('layouts.admin')
@section('contenido')

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-upload-cloud bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Subir archivo</h5>
                        <span>Gestion de contenido y evaluaciones</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!">Subir archivo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row text-center">
        <div class="col-md-12 ">
             {{ Form::open(array('url' => 'imageUpload', 'method' => 'PUT', 
             'name'=>'product_images', 'id'=>'dropzone', 'class'=>'dropzone', 'files' => true))}} 
            <div class="row miform">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label class="milabel">Titulo</label>
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control miInput" required>
                    </div>
                </div>
            </div>

            <div class="row miform">
                <div class="col-md-12">    
                    <label class="milabel">Descripción.</label>
                    <div class="form-group">
                        <textarea class="form-control miInput" name ="descripcion" rows="5" required></textarea>
                    </div>              
                </div>
            </div>

            <div class="dropzone-previews"></div>
            <div class="fallback">
                <!-- this is the fallback if JS isn't working -->
                <input name="file" type="file" multiple />
            </div>
            <div class="dz-default dz-message" id="span">
                <div>
                    <img src="{{asset('images/upload.png')}}" width="250px" height="250px"><br>
                </div>
                <label>Arrastre su Archivo aqui<label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" id="submit-all">Guardar</button>
            </div>
            {{ Form::close() }}

        </div>
    </div>

<script type="text/javascript">

    Dropzone.options.dropzone =
        {
            autoProcessQueue: false,
            parallelUploads: 1,
            maxFilesize: 1,
           
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            addRemoveLinks: true,
            timeout: 5000,
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            },
            init: function () {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                // for Dropzone to process the queue (instead of default form behavior):
                document.getElementById("submit-all").addEventListener("click", function (e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });
                this.on("error", function(file, response) { 
                // do stuff here. 
                alert(response);

                }); 

            },
            /* EL EVENTO ACCEPT NOS PERMITE CAMBIAR LA IMAGEN DE VISTA PREVIA QUE SE MUESTRA */
            accept: function (file, done) {
                var thumbnail = $('.dropzone .dz-preview.dz-file-preview .dz-image:last');

                switch (file.type) {
                    case 'application/pdf':
                        thumbnail.css('background', 'asset(images/pdf.png)');
                        break;
                    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                        thumbnail.css('background', 'asset(images/doc.png)');
                        break;
                    case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                        thumbnail.css('background', 'url(images/excel.png)');
                        break;
                    case 'application/vnd.ms-excel':
                        thumbnail.css('background', 'url(images/excel.png)');
                        break;
                    case 'application/zip, application/x-compressed-zip':
                        thumbnail.css('background', 'url(images/rar.png)');
                        break;
                    case 'application/vnd.ms-powerpointtd>':
                        thumbnail.css('background', 'url(images/ppt.png)');
                        break;
                    case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
                        thumbnail.css('background', 'url(images/ppt.png)');
                        break;
                    case 'image/jpeg':
                        break;
                    case 'image/png':
                        break;
                    default:
                        thumbnail.css('background', 'url(dist/images/nose.png');
                }

                done();
            },
            success: function (file) {
                if (file.previewElement) {

                    return file.previewElement.classList.add("dz-success"),
                        $(function () {
                            setTimeout(function () {
                                $('.dz-success').fadeOut('slow');
                                $(".dropzone.dz-started .dz-message").show();
                            }, 2500);
                            alert("Se guardo");
                        });
                }
            },
            // Borrar archivos 

        };
</script>
@endsection