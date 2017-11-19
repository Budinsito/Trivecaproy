<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Optional theme -->

	<link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

	<!-- Latest compiled and minified JavaScript -->

	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
        
        
        <!--Los scripts del campo fecha-->
        
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>
$(function () {
$("#fecha").datepicker();
});
</script>
        <!-- Fin de los scripts del campo fecha-->



<form class="form-horizontal" action="{{ route('updateEmpleadoxDni') }}"  method="get">
       {{csrf_field()}}
<fieldset>

  
<center><legend>Formulario de edicion del trabajador</legend></center>

<!-- Text input-->
    <div class="form-group">
  <label class="col-md-4 control-label" for="etxtDni">DNI</label>  
  <div class="col-md-4">
  <input id="txtDni" name="etxtDni" placeholder="DNI a bsucar" class="form-control input-md" type="text" value="{{ $empleado->dni }}">
     </div>
    </div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectSede">Sede</label>
  <div class="col-md-4">
        @if($sedes)
    <select id="selectSede" name="selectSede" class="form-control">
                <option>Seleccione Sede</option>
                @foreach($sedes as $data)
                <option value="{{ $data->id}}" @if($empleado->sede_id==$data->id)selected @endif>{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
  </div>
</div>



   <div class="form-group">
  <label class="col-md-4 control-label" for="txtape">Apellidos</label>  
  <div class="col-md-4">
  <input id="txtape" name="txtape"  class="form-control input-md" type="text" value="{{ $empleado->apellidos }}" >
     </div>
    </div>


   <div class="form-group">
  <label class="col-md-4 control-label" for="txtname">Nombres</label>  
  <div class="col-md-4">
  <input id="txtname" name="txtname"  class="form-control input-md" type="text" value="{{ $empleado->nombres }}">
     </div>
    </div>




<div class="form-group">
  <label class="col-md-4 control-label" for="txtNaci">Fecha de Nacimiento</label>  
  <div class="col-md-3">
  <input  id="fecha" name="txtNaci" placeholder="Año/mes/dia" class="form-control input-md" type="text" value="{{ $empleado->FNacimiento }}">
    
  </div>
</div>
 
 

<div class="form-group">
  <label class="col-md-4 control-label" for="txtdir">Dirección</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="txtdir" name="txtdir"   >{{ $empleado->direccion }}</textarea>
  </div>
</div>


    <div class="form-group">
        <label class="col-md-4 control-label">Teléfono:</label> 
        <div class="col-md-2">
            <input name="txtFono" type="text" class="form-control" placeholder="Teléfono" value="{{ $empleado->telefono }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Celular:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-2">
            <input name="txtCelu" type="tel" class="form-control" value="{{ $empleado->celular }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Correo:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-4">
            <input name="txtCorreo" type="text" class="form-control" id="txtcorreo" value="{{ $empleado->email }}">
        </div>
    </div>

    <div class="form-group"> 
        <label class="col-md-4 control-label">Profesión:</label>
        <div class="col-md-2">
            @if($profesiones)
            <select name="cmbProfesion" class="form-control">
                <option value="">Seleccione profesión</option>
                @foreach($profesiones as $data)
                <option value="{{ $data->id}}" @if($empleado->profesion_id==$data->id)selected @endif>{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>


 <div class="form-group">
        <label class="col-md-4 control-label">Cargo:</label>
        <div class="col-md-2">
            @if($cargos)
            <select name="cmbCargo" class="form-control">
                <option value="">Seleccione nivel</option>
                @foreach($cargos as $data)
                <option value="{{ $data->id}}" @if($empleado->cargo_id==$data->id)selected @endif>{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>


<div class="form-group">
        <label class="col-md-4 control-label">Año Experiencia:</label> 
        <div class="col-md-1">
            <input name="txtanioexp" type="text" class="form-control"  value="{{ $empleado->anioexpe }}">
        </div>
    </div>

<div class="form-group">
        <label class="col-md-4 control-label">Meses Experiencia:</label> 
        <div class="col-md-1">
            <input name="txtmesesexp" type="text" class="form-control" value="{{ $empleado->mesexpe }}">
        </div>
    </div>



    <div class="form-group">
        <label class="col-md-4 control-label">Nivel academico:</label>
        <div class="col-md-2">
            @if($nivelacademico)
            <select name="cmbAcademico" class="form-control">
                <option value="">Seleccione nivel</option>
                @foreach($nivelacademico as $data)
                <option value="{{ $data->id}}" @if($empleado->nacademico_id==$data->id)selected @endif>{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Fecha ultimo grado obtenido:</label>
        <div class="col-md-2">
            <input id="fechaobt" name="txtFuGradoObtenido" type="text" class="form-control input-md" placeholder="dd-mm-aaaa"  value="{{ $empleado->fgobtenido }}"> 
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Estado civil:</label>
        <div class="col-md-2">
            @if($estadociviles)
            <select name="cmbEstadocivil" class="form-control">
                <option value="">Seleccione Estado</option>
                @foreach($estadociviles as $data)
                <option value="{{ $data->id}}" @if($empleado->estadocivil_id==$data->id)selected @endif>{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>



 <div class="form-group">
        <label class="col-md-4 control-label">Sexo:</label>
        <div class="col-md-2">
            @if($sexos)
            <select name="cmbSexo" class="form-control">
                <option>Seleccione el sexo</option>
                @foreach($sexos as $data)
                <option value="{{ $data->id}}"  @if($empleado->id_sexo == $data->id)selected @endif>{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>



    <hr size="8px" width="100%" noshade="noshade" align="center" />
    <h3><center>Información de contacto</center></h3>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-xs-4 control-label" for="selectbasic">Tipo de Parentesco</label>
        <div class="col-md-2">
            @if($estadociviles)
            <select name="cmbParentesco" class="form-control">
                <option>Seleccione Parentesco</option>
                @foreach($tipoparentesco as $data)
                <option value="{{ $data->id}}"  @if($empleado->tipparentesco_id==$data->id)selected @endif>{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Apellidos y Nombres</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        
        <div class="col-md-4">
            <input name="txtNom2" type="text" class="form-control" placeholder="Nombres completos" value="{{ $empleado->nomcontacto }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Dirección:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-4">
            <textarea name="txtDir2" rows="3" class="form-control" placeholder="Dirección"> {{ $empleado->dircontacto }}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Teléfono:</label> 
        <div class="col-md-2">
            <input name="txtFono2" type="text" class="form-control" placeholder="Teléfono" value="{{ $empleado->telecontacto }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Celular:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-2">
            <input name="txtcelu2" type="tel" class="form-control" placeholder="Celular" value="{{ $empleado->celucontacto }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">correo electronico:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-3">
            <input name="txtemail2" type="tel" class="form-control" placeholder="Ingrese su email" value="{{ $empleado->emailcontacto }}">
        </div>
    </div>
    <style type="text/css">
        .btn-procesa {
            margin-left: 10px;
        }
    </style>

    <div class="form-group">
        <label class="col-md-4 control-label"> ¿ Cantidad de hijos del empleado ?</label>
        <div class="row col-xs-2">
            <input name="txtNhijos" id="remitosucursal" type="text" required placeholder="Ingrese en numeros" class="col-xs-6" value="{{ $empleado->nhijos }}">
 </div>
    </div> 
  
  
   <br></br>


            <div class="form-group">
                <div class="col-xs-offset-5 col-xs-9">
                    <input type="submit" class="btn btn-primary" onclick="ConfirmDemo()"  value="Guardar cambios">
   </fieldset>
  
  <script type="text/javascript">
function ConfirmDemo() {
alert("¡Los datos fueron actualizados!");
}
</script>
  
  
  
  
   <!--Me carga la configuracion del Datapicker-->
  <script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy/mm/dd', 
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fecha").datepicker();
$("#fechaobt").datepicker();
});
</script>
   <!-- Fin de la  configuracion del Datapicker-->
  


 

</form>