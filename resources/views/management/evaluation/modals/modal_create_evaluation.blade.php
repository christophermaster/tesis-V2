<div class="modal fade bd-example-modal-lg" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-create-evaluation">
{!!Form::open(array('url'=>'gestion/contenido/evaluacion/crear','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
	<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Caracteristicas del Parcial</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row miform">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleFormControlSelect2" class="milabel">Tema</label>
                                <select name="tema" class="form-control miInput" 
                                data-style="select-with-transition" title="Tema" data-size="7" required>                                            
                                    @foreach($tema as $tema)
                                    <option value="{{$tema->id}}">{{$tema->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleFormControlSelect2" class="milabel">Evaluación</label>
                                <select  name="tipo" class="form-control miInput" 
                                data-style="select-with-transition" title="Escuela" data-size="7" required>
                                    @foreach($tipo_evaluacion as $tipo_evaluacion)
                                    <option value="{{$tipo_evaluacion->id}}">{{$tipo_evaluacion->nombre}}</option>
                                    @endforeach
                                </select>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label for="exampleFormControlSelect2" class="milabel">Tipo Ejercicio</label>
								<select id="tipo" name="evaluacion" class="form-control miInput" 
								data-style="select-with-transition" title="Escuela" data-size="7" required>
									@foreach($tipo as $tipo)
									<option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleFormControlSelect2" class="milabel">Dificultad</label>
                                <select id="dificultad" name="dificultad"  data-style="select-with-transition" 
                                class="form-control miInput" data-style="select-with-transition" title="Escuela" 
                                data-size="7" required>
                                    @foreach($dificultad as $dificultad)
                                    <option value="{{$dificultad->id}}">{{$dificultad->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
						</div>
						<br>
						<div class="row miform">
							<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
								<label class="milabel">Numero de pregunta teorica </label>
								<div class="form-group">
									<input type="number" name="nTeorico" class="form-control miInput" value="0" required>
								</div>
							</div>
							<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
								<label class="milabel">Numero de pregunta Practica </label>
								<div class="form-group">
									<input type="number" name="nPractico" class="form-control miInput" value="0" required>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleFormControlSelect2" class="milabel">Generar</label>
                                <select id="dificultad" name="generar"  data-style="select-with-transition" 
                                class="form-control miInput" data-style="select-with-transition" title="Escuela" 
                                data-size="7" required>
									<option value="1">Automatica</option>
									<option value="2">Manual</option>
                                </select>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Generar</button>
				</div>
			</div>
		</div>
	{{Form::Close()}}
</div>
