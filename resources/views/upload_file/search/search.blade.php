{!! Form::open(array('url' => 'gestion/contenido/archivos/subidos' , 'method'=> 'Get','autocomplete' =>'on','role' => 'search'))!!}
    <div class="col-xl-12 col-md-12 buscador">
        <div class=" col-xl-4 col-md-4 ">
            <div class="input-group ">
                <input type="text" class="form-control" name="searchText" placeholder="Buscar" value ="{{$searchText}}">
                <button type="submit" class="btn btn-primary btn-just-icon">
                        <i class="feather icon-search "></i>
                </button>
            </div>
        </div>
    </div>
{{Form::close()}}
