<div class="modal fade bd-example-modal-lg" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-show-{{$upl->id}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detalles del Archivo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<label for="" class=""><b>Usaurio:</b> </label><p>{{$upl->usuario_creador}}</p> 
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<label for="" class=""><b>fecha:</b> </label><p>{{$upl->created_at}}</p> 
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<label for="" class=""><b>Nombre:</b> </label> <p>{{$upl->titulo}}</p>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<label for="" class=""><b>Peso:</b> </label><p>{{$upl->usuario_creador}}</p> 
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="" class=""><b>Descripción:</b> </label> <p>{{$upl->descripcion}}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ok</button>
			</div>
		</div>
	</div>
</div>
