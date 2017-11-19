<html>
    <head>
        
      
        
        <title>Busqueda de empleado por DNI</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
         <link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        
     
        
        <div class="container">
  <h2>Seleccione el empleado a editar</h2>
  
  <form action="{{ route('getlistModifEmpleado') }}" id="form" method="get">  
      
      <div class="form-group">
  <label class="col-md-4 control-label" for="txtdni">DNI</label>  
  <div class="col-md-4">
  <input id="txtdni" name="txtdni" placeholder="Dni a buscar" class="form-control input-md"  type="text">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnBuscar"></label>
  <div class="col-md-4">
    <button id="btnBuscar" name="btnBuscar" class="btn btn-primary">Buscar</button>
  </div>
</div>
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
          <th>dni</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>F.Nacimiento</th>
        <th>Direccion</th>
        <th>Teléfono</th>
      </tr>
    </thead>
    <tbody>
         @if($empleado) @foreach($empleado as $data)
      <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->dni}}</td>
        <td>{{$data->nombres}}</td>
       <td>{{$data->apellidos}}</td>
       <td>{{$data->FNacimiento}}</td>
       <td>{{$data->direccion}}</td>
       <td>{{$data->telefono}}</td>
       <td><a class="btn btn-success" href="../empleado/edit/{{$data->id}}" target="_blank" role="button">Editar Empleado  </a> </td>
       <td><a class="btn btn-success" href="../hijo/listahijos/{{$data->id}}" target="_blank" role="button">Editar Hijos </a>
      </tr>
     @endforeach @endif
      
    </tbody>
  </table>
</div>
        
        </form>  
    </body>
</html>
