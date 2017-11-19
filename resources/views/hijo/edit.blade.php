<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Industrias Triveca</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
         <link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
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

      
        <form class="form-horizontal" action="{{ route('updateHijo',$id) }}" method="put"   >
<fieldset>
{{csrf_field()}}
<!-- Form Name -->
<center><legend>Edición de datos del hijo</legend></center>

<input id="txtid" name="txtid" placeholder="" class="form-control input-md" required="" type="hidden" value= "{{ $id }}">
    

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtnombre">Nombres</label>  
  <div class="col-md-4">
  <input id="txtnombre" name="txtnombre" placeholder="" class="form-control input-md" required="" type="text" value="{{ $hijos->nombres }}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtapellidos">Apellidos</label>  
  <div class="col-md-4">
  <input id="txtapellidos" name="txtapellidos" placeholder="" class="form-control input-md" required="" type="text" value="{{ $hijos->apellidos }}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtfnacimiento">Fecha de Nacimiento</label>  
  <div class="col-md-2">
  <input id="fecha" name="txtfnacimiento" placeholder="" class="form-control input-md" required="" type="text" value="{{ $hijos->fnacimiento }}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtdni">DNI</label>  
  <div class="col-md-3">
  <input id="txtdni" name="txtdni" placeholder="" class="form-control input-md" type="text" value="{{ $hijos->dni }}">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectsex">Sexo</label>
  <div class="col-md-4">
     @if($sexos)
            <select name="cmbSexo" class="form-control">
                <option value="">Seleccione el sexo</option>
                @foreach($sexos as $data)
                <option value="{{ $data->id}}"  @if($hijos->id_sexo==$data->id)selected @endif >{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnedit"></label>
  <div class="col-md-4">
      <button  type="submit"  id="btnedit" name="btnedit" class="btn btn-success" >Guardar cambios</button>
  </div>
</div>

</fieldset>
</form>
        
    </body>
</html>
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