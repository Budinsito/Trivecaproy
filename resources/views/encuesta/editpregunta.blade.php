<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Optional theme -->
  <link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
  <!-- Latest compiled and minified JavaScript -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>



<form class="form-horizontal" action="{{ route('updpregunt') }}" method="get">
<fieldset>

<!-- Form Name -->
<legend>Modificar Pregunta</legend>

<!-- Text input-->




<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="txtnropreg">Nro Pregunta</label>  
  <div class="col-md-1">
  <input id="txtpregunta" name="txtnropreg" placeholder="" class="form-control input-md" type="text"  readonly="readonly" value="{{ $preg->nropregunta }}"  >
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="txtpregunta">Pregunta</label>  
  <div class="col-md-8">
  <input id="txtpregunta" name="txtpregunta" placeholder="" class="form-control input-md" type="text" value="{{ $preg->pregnom }}" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="txtcompet">Competencia</label>  
  <div class="col-md-3">
  <input id="txtpregunta" name="txtcompet" placeholder="" class="form-control input-md" type="text" readonly="readonly" value="{{ $preg->competencia }}" >
    
  </div>
</div>



<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="" name="Modificar" class="btn btn-primary">Modificar</button>
  <a href="{{ URL::route('ListPreguntas') }}" class="btn btn-default"> Regresar </a>
  </div>
</div>

</fieldset>
</form>