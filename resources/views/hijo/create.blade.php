<meta charset="utf-8" />

<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('js/jquery-ui/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
<link href="{{ asset('js/jquery-ui/jquery-ui.theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">


<TITLE>Registro de Hijos</TITLE>

<br></br> 

<form id="frm-alumno" action="{{ route('saveHijo') }}" method="post" enctype="multipart/form-data">

    {{csrf_field()}}
    
    <!--Validando una sesion-->
<!--     @if(session('key')['id']==null)-->
   
<!--   @else-->
      <input type="hidden" value="{{ session('key')['id'] }}"name="id_empleado">
     <!--@endif-->
 <!--Fin de la Validacion de una sesion-->
   

     
     <!--<h1>Empleado: {{ session('key')['dni'] }} - {{ session('key')['nombres'] }}</h1>--> 

    <h1><center> Formulario de registro de hijos</center></h1>
  
    
    <h2><center> DNI : {{ session('key')['dni'] }}</center></h2>
    


     @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                   <center> Todo campo con * es obligatorio</center>
                </ul>
            </div>
        @endif

<br></br>

    <div id="alumnos" class="row">
        <div id="lo-que-vamos-a-copiar">
            <div class="col-xs-4">
                <div class="well well-sm">

 

                   

 <div class="form-group">


                        <label>Apellidos</label> <b> <FONT SIZE=4> <font color="red">*</font> </FONT></b>
                        <input type="text" name="Apellido[]" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
                    </div>



                    <div class="form-group">
                        <label>Nombres</label> <b> <FONT SIZE=4> <font color="red">*</font> </FONT></b>
                        <input type="text" name="Nombre[]" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
                    </div> 

                   

                    <div class="form-group">
                        <label>DNI</label> <b> <FONT SIZE=4> <font color="red">*</font> </FONT></b>
                        <input type="text" name="DNI[]" class="form-control" placeholder="Ingrese los 8 digitos" data-validacion-tipo="requerido|min:10" />
                    </div>



<div class="form-group"> 
    
    <label class="col-md-2 control-label" for="selectbasic">Sexo</label>
    @if($sexos)
    <select id="selectbasic" name="cmbSexo[]" class="form-control">
        <option> Seleccion el sexo </option>
        @foreach($sexos as $data)
        <option value="{{ $data->id}}">{{$data->nombres}}</option>
        @endforeach
    </select>
    @endif
</div>




                    <label>Fecha de Nacimiento</label> <b> <FONT SIZE=4> <font color="red">*</font> </FONT></b>
                    <div class='input-group date' id='divMiCalendario'>

                        <input type='text' name=FechaNacimiento[] id="txtFecha" class="form-control" placeholder="aaaa-mm-dd" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>







                    <script type="text/javascript">
                        $('#divMiCalendario').datetimepicker({
                            format: 'YYYY-MM-DD '
                        });
                        // $('#divMiCalendario').data("DateTimePicker").show();
                    </script>

                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="well">
                <button id="btn-alumno-agregar" class="btn btn-lg btn-block btn-default" type="button">Agregar</button>

            </div>
        </div>
    </div>

    <hr />

    <div class="text-right">
        <button type="submit" class="btn btn-success btn-lg btn-block" action="{{ route('saveEmpleado') }}" type="button">Guardar</button>
    </div>
</form>

<script>
    <?php
$N=1;
while($N>=3){
$N++;
}

?>
    $(document).ready(function() {

        // El formulario que queremos replicar
        var formulario_alumno = $("#lo-que-vamos-a-copiar").html();

        // El encargado de agregar más formularios
        $("#btn-alumno-agregar").click(function() {
            // Agregamos el formulario

            $("#alumnos").prepend(formulario_alumno);

            // Agregamos un boton para retirar el formulario
            $("#alumnos .col-xs-4:first .well").append('<button class="btn-danger btn btn-block btn-retirar-alumno" type="button">Retirar</button>');

            // Hacemos focus en el primer input del formulario
            $("#alumnos .col-xs-4:first .well input:first").focus();

            // Volvemos a cargar todo los plugins que teníamos, dentro de esta función esta el del datepicker assets/js/ini.js
            Plugins();
        });

        // Cuando hacemos click en el boton de retirar
        $("#alumnos").on('click', '.btn-retirar-alumno', function() {
            $(this).closest('.col-xs-4').remove();
        })

        $("#frm-alumno").submit(function() {
            return $(this).validate();
        });
    })
</script>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/jquery.anexsoft-validator.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('css/Template/bootstrap.min.css') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>



<script type="text/javascript">
    $('#divMiCalendario').datetimepicker({
        format: 'YYYY-MM-DD '
    });
    // $('#divMiCalendario').data("DateTimePicker").show();
</script>