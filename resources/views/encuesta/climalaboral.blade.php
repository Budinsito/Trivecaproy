<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Optional theme -->
	<link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>




<div class="jumbotron" id="cabecera">

    <title>Clima Laboral</title>
<h1><center>INDUSTRIAS TRIVECA</center></h1>

<h3 style="text-indent:10px;"><center> A continuación encontrará una serie de enunciados relacionados  con situaciones o características de su ámbito laboral, cada una tiene 4 opciones para responder de acuerdo a lo que describa mejor su relación /experiencia con  Industrias Triveca. Lea cuidadosamente cada pregunta y coloque su respuesta de acuerdo a las siguientes opciones:                              								
</center></h3>
</div>

<form class="form-inline" action="{{ route('storeclimalaboralempleado') }}" method="post">
    <div class="fcol-lg-3 col-lg-offset-2">
    {{csrf_field()}}

        <label class="col-md-1 control-label" for="selectbasic">Sede</label>
        <div class="col-md-4">

            @if($sedes)
            <select id="selectbasic" name="selectsede" class="form-control">
                <option value="1">Seleccione Sede</option>
                @foreach($sedes as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>

    <div class="form-group">

        <label class="col-md-3 control-label" for="selectbasic">Sexo</label>
        <div class="col-md-4">
            @if($sexos)
            <select id="selectbasic" name="selectsexo" class="form-control" >
                <option value="1">Seleccione Sexo</option>
                @foreach($sexos as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>

    

 


    </div>


<br></br>
    <div>
<button type="submit" class="btn btn-primary btn-lg" style="position:absolute;left:570;top:450;"
 action="{{route('storeclimalaboralempleado') }}">Siguiente</button>
 </div>


</form>