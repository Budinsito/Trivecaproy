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
        
         <!--CSS DE LA TABLA-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--FIN DE CSS DE LA TABLA-->
  
<!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
<!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        
        
        <form class="form-horizontal" action="{{ route('reportepdf_create') }}" id="form" method="get">
<fieldset>

<!-- Form Name -->
<legend>Reporte generales </legend>
  <?php
$vaño = date("Y")
?>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtanio">Año</label>  
  <div class="col-md-2">
  <input id="txtanio" name="txtanio" placeholder="" class="form-control input-md" required="" type="text" value= <?php echo $vaño  ?> >
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cmbSede">Sede</label>
  <div class="col-md-2">
     @if($sedes)
            <select name="cmbSede" class="form-control" >
              
                @foreach($sedes as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach
            </select>
            @endif
  </div>
  
  <div class="col-md-4">
    <button id="singlebutton" name="btnbuscar" class="btn btn-primary">Buscar</button>
  </div>
  
</div>





<div class="container">
    
  <table class="table table-striped">
    <thead>
      <tr>
          <th style="visibility: hidden">Id</th>
        <th>Nro Encuesta</th>
        <th>Fecha</th>
        <th>Sexo</th>
        <th>Exportar</th>
      </tr>
    </thead>
    <tbody>
         @if($Tablareporte) @foreach($Tablareporte as $data)
      <tr>
        <td style="visibility: hidden">{{$data->id}}</td>
        <td>{{$data->nroencuesta}}</td>
        <td>{{$data->fecha}}</td>
        <td>{{$data->nombres}}</td>
        <td><a class="btn btn-success" href="../encuesta/imprimirpdfxsede/{{$data->id}}" target="_blank" role="button">PDF  </a> </td>

        
      </tr>
       @endforeach @endif
    </tbody>
  </table>
</div>



</fieldset>
</form>
        
        
    </body>
</html>
