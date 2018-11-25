<div class="modal fade" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-solution-{{$sol->id}}">
	@if($ubication == 'Publication')
		{{Form::Open(array('action'=>array('SolutionController@destroy','0',$sol->id),'method'=>'delete'))}}
	@else
		{{Form::Open(array('action'=>array('SolutionController@destroy',$ejer->id,$sol->id),'method'=>'delete'))}}
	@endif
	<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Solución</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar la solución</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
	{{Form::Close()}}
</div>
