<html lang="es">
<head>
</head>
<body>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
<!-- Optional theme -->
<link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<!-- Latest compiled and minified JavaScript --> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<h2>
  <center>
    Examen Nro : {{ session('key')['nroexamen'] }}
   
  </center>
</h2>

<div class="fcol-lg-3 col-lg-offset-2">
<form action="" id="form" method="get">

  {{csrf_field()}}
  <!--Me da el numero de pagina-->
  <input type="hidden" name="pagina" value="{{ $sig_pagina }}"> 
  <table class="table table-bordered">
    <tr>
      <th width="4%"><center>
          Nro
        </center></th>
      <th width="60%"> <center>
          Preguntas
        </center>
      </th>
      <th> <center>
          Respuesta
        </center></th>
    </tr>
    @if($preguntas) @foreach($preguntas as $data)
    <tr>
      <td> {{$data->nropregunta}}</td>
      <td> {{$data->nombre}}</td>
      <td><label class="col-md-1 control-label" for="selectbasic" ></label>
        <div class="col-md-10" > 
        @if($respuestas)
          <select id="selectbasic" name="selectbasic[{{ $data->id }}]" class="form-control" >
            <option value="">Seleccione una opcion</option>
            
             @foreach($respuestas as $data)
                            
            <option value="{{ $data->id}}">{{ $data->nombres}}</option>
            
             @endforeach
                          
          </select>
          @endif </div></td>
    </tr>
    @endforeach @endif
  </table>
</form>
@if(count($preguntas)>0)
<div type="button" class="btn btn-primary btn-lg btn-block sig-btn">Siguientes Preguntas</div>
@else
<a type="button" onclick="ConfirmDemo()" class="btn btn-success btn-lg btn-block" ID="btnSave" href="{{  url('encuesta/finalizar') }}">Finalizar Exámen</a>
<script type="text/javascript">


function ConfirmDemo() {
alert("Se generara un reporte pdf");

//Desabilita el boton finalizar
$("#btnSave").attr('disabled', true);

}

</script>
@endif
<script>
    $(document).ready(function(){
        $(".sig-btn").click(function(e){
            e.preventDefault(); //Quita el comprotamiento de redireccion del enlace que tiene por defecto.
            $(".error-msj").remove(); //Quitamos todos los mensajes de error.
            for(i in $("select")){ //Recorremos todos los sectes y buscamos el que no ha sido selccionados. input, select
                if($("select").eq(i).val() == ''){
                    //alert('Por favor compelte todos los campos.');
                    $("select").eq(i).parent().append('<span style="color:#f00; display:block" class="error-msj">Complete este campo</span>');
                    return false;
                }
            }
            $("#form").submit(); 
        });
    });

</script>

</body>
</html>