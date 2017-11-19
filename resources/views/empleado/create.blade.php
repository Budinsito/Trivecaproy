

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Optional theme -->
	<link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<br></br>




&nbsp &nbsp &nbsp <img src="{{ asset('imagenes/indice.png') }}"   alt="imagen" border="0">

<TITLE>Registro de Empleados</TITLE>
	<form action="store" method="POST" class="form-horizontal" >
    {{csrf_field()}}

    <legend>
        <center>Registro de Empleados</center>
    </legend> 
<div class="form-group">

 

 @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                   <center> Todo campo con * es obligatorio</center>
                </ul>
            </div>
        @endif

<br></br>
           


        <label class="control-label col-xs-3">Sede:</label> 
        <div class="col-md-3">

            @if($sedes)
            <select name="cmbSede" class="form-control" >
                <option value="" >Seleccione Sede</option>
                @foreach($sedes as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-xs-3">DNI:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-2">
            <input name="txtDni" type="text" class="form-control" id="inputEmail" placeholder="Ingrese los 8 digitos">
        </div>
    </div>

   
 <div class="form-group">
        <label class="control-label col-xs-3">Apellidos:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-4">
            <input name="txtApe" type="text" class="form-control" placeholder="Apellidos completos">
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-xs-3">Nombres:</label> <b> <FONT SIZE=4> <font color="red">*</font> </FONT></b>
        <div class="col-md-4">
            <input name="txtNombre" type="text" class="form-control" id="inputPassword" placeholder="Nombres completos">
        </div>
    </div>

   

    <div class="form-group">
        <label class="control-label col-xs-3">F. Nacimiento:</label>
        <div class="col-md-1">
            <select name="cmbDia" class="form-control">
                <?php for($i=1;$i<=31;$i++){    ?>
                    <option value="<?php echo sprintf('%02d',$i) ?>">
                        <?php echo sprintf('%02d',$i) ?>
                    </option>
                    <?php } ?>
            </select>
        </div>

        <div class="col-md-2">
            <select name="cmbMes" class="form-control">

                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="cmbAnio" class="form-control">
                <?php 
            $aniomin=date("Y")-100;
            $anio=date("Y");
        while($anio>$aniomin){ 
            $anio--;
        ?>
                    <option value="<?php echo $anio;?>">
                        <?php  echo $anio;?>
                    </option>
                    <?php 
        } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Dirección:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-4">
            <textarea name="txtDir" rows="3" class="form-control" placeholder="Dirección"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Teléfono:</label> 
        <div class="col-md-2">
            <input name="txtFono" type="text" class="form-control" placeholder="Teléfono">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Celular:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-2">
            <input name="txtCelu" type="tel" class="form-control" placeholder="Celular">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Correo:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-4">
            <input name="txtCorreo" type="text" class="form-control" id="txtcorreo" placeholder="correo personal">
        </div>
    </div>

    <div class="form-group"> 
        <label class="control-label col-xs-3">Profesión:</label>
        <div class="col-md-2">
            @if($profesiones)
            <select name="cmbProfesion" class="form-control">
                <option value="">Seleccione profesión</option>
                @foreach($profesiones as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>
    
      <div class="form-group">
        <label class="control-label col-xs-3">Cargo:</label>
        <div class="col-md-2">
            @if($cargos)
            <select name="cmbCargo" class="form-control">
                <option value="">Seleccione nivel</option>
                @foreach($cargos as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="control-label col-xs-3">Años de experiencia:</label> 
        <div class="col-md-1">
            <input name="txtanioexp" type="text" class="form-control" placeholder="Solo numerico" value="0">
        </div>
    </div>
    
     <div class="form-group">
        <label class="control-label col-xs-3">Meses de experiencia:</label> 
        <div class="col-md-1">
            <input name="txtmesexp" type="text" class="form-control" placeholder="Solo numerico" value="0">
        </div>
    </div>

    
  <div class="form-group">
        <label class="control-label col-xs-3">Nivel academico:</label>
        <div class="col-md-2">
            @if($nivelacademico)
            <select name="cmbAcademico" class="form-control">
                <option value="">Seleccione nivel</option>
                @foreach($nivelacademico as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>
    
    
    
    
    <div class="form-group">
        <label class="control-label col-xs-3">Fecha ultimo grado obtenido:</label>
        <div class="col-md-2">
            <input name="txtFuGradoObtenido" type="date" class="form-control" placeholder="aaaa-mm-dd">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Estado civil:</label>
        <div class="col-md-2">
            @if($estadociviles)
            <select name="cmbEstadocivil" class="form-control">
                <option value="">Seleccione Estado</option>
                @foreach($estadociviles as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>



 <div class="form-group">
        <label class="control-label col-xs-3">Sexo:</label>
        <div class="col-md-2">
            @if($sexos)
            <select name="cmbSexo" class="form-control">
                <option value="">Seleccione el sexo</option>
                @foreach($sexos as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>




  

    <hr size="8px" width="100%" noshade="noshade" align="center" />
    <h3><center>Información de contacto</center></h3>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-xs-3 control-label" for="selectbasic">Tipo de Parentesco</label>
        <div class="col-md-2">
            @if($estadociviles)
            <select name="cmbParentesco" class="form-control">
                <option value="">Seleccione Parentesco</option>
                @foreach($tipoparentesco as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Apellidos y Nombres</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        
        <div class="col-md-4">
            <input name="txtNom2" type="text" class="form-control" placeholder="Nombres completos">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Dirección:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-4">
            <textarea name="txtDir2" rows="3" class="form-control" placeholder="Dirección"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Teléfono:</label> 
        <div class="col-md-2">
            <input name="txtFono2" type="text" class="form-control" placeholder="(indice)+Teléfono">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Celular:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-2">
            <input name="txtcelu2" type="tel" class="form-control" placeholder="Celular">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">correo electronico:</label> <b> <FONT SIZE=4> <font color="red">*</font></b> </FONT>
        <div class="col-md-3">
            <input name="txtemail2" type="tel" class="form-control" placeholder="Correo Personal">
        </div>
    </div>
    <style type="text/css">
        .btn-procesa {
            margin-left: 10px;
        }
    </style>

    <div class="form-group">
        <label class="control-label col-xs-3"> ¿ Cantidad de hijos del empleado ?</label>
        <div class="row col-xs-2">
            <input name="txtNhijos" id="remitosucursal" type="text" required placeholder="Ingrese en numeros" class="col-xs-6" value="0">
 </div>
    </div>
            <!--<p>

</p>
      <input type="submit" class="btn btn-primary btn-procesa" value="Procesar">

  </div>

  </div>
</div>-->

<br></br>
<br></br>

            <div class="form-group">
                <div class="col-xs-offset-3 col-xs-9">
                    <input type="submit" class="btn btn-primary" value="Enviar">
  <input type="reset" class="btn btn-default" value="Limpiar">
                     </div></div> 


</div>
 </div>

</form> 





