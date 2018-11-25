<div class="modal fade" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$upl->id}}">
{{Form::Open(array('action'=>array('UploadController@destroy',$upl->id),'method'=>'delete'))}}
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Ejercicio</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar el Ejercicio</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
	{{Form::Close()}}
</div>
