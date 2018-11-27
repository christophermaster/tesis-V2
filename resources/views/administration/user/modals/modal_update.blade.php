<div class="modal fade bd-example-modal-lg" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-create">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detalles del Archivo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
  			{!!Form::open(array('url'=>'gestion/contenido/administracion/usuarios','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" required value = "{{old('nombre')}}" class="form-control" >
						</div>
					</div>
				
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="apellido">Apellido</label>
							<input type="text" name="apellido"  value = "{{old('apellido')}}" class="form-control">
						</div>
					</div>

					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="cedula">Cedula</label>
							<input type="text" name="cedula"  value = "{{old('cedula')}}" class="form-control">
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="exampleFormControlSelect2">Cargo</label>
						<select name="id_cargo" class="form-control" data-style="select-with-transition" title="Facultad" data-size="7">
							@foreach($cargo as $car)
								<option value="{{$car->id}}">{{$car->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="exampleFormControlSelect2">Materia</label>
						<select id="matter" name="id_materia"  data-style="select-with-transition"  class="form-control" data-style="select-with-transition" title="Escuela" data-size="7">
						@foreach($materia as $mat)
							<option value="{{$mat->id}}">{{$mat->nombre}}</option>
						@endforeach
						</select>
					</div>

				</div>
				<br>
				<div class="row">

					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="password">Contraseña</label>
							<input type="text" name="password"  value = "{{old('password')}}" class="form-control">
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="name">Usuario</label>
							<input type="text" name="name" required value = "{{old('name')}}" class="form-control" >
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="email">Correo</label>
							<input type="text" name="email"  value = "{{old('email')}}" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>
