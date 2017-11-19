<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
<!-- Optional theme -->
<link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">



<html>
    <head>
        <title> Clima laboral</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       
        
        <div class="container">
  <h2>Reporte de Clima Laboral</h2>
  
  
  <form class="form-inline" action="{{ route('Reportclimalaboral') }}" method="get">
  
  <div class="form-group col-xs-3" >
            <input type="text" class="form-control" name="nombre" id="txtanio" placeholder="Año a buscar">
        </div>
  
  <button type="submit" class="btn btn-primary">Buscar</button>
        <a class="btn btn-success" href="{{ route('exportclimalaboral',  
            [
                !empty($_GET['nombre']) ? $_GET['nombre'] : 'vacio', 
              ]) }}" >Excel</a>
            
  <table class="table table-striped" style="overflow: auto; height: 100px;">
    <thead>
      <tr>
        <th style="width:120px">Sede</th>
        <th style="width:120px">Nro Encuesta</th>
        
 
        @foreach($Preguntas as $pregunta)
        <th style="width:130px">Pgta {{ $pregunta->nropregunta }} - {{ $pregunta->inicial }}</th>
        @endforeach
     
      </tr>
    </thead>
    <body>
      @foreach($data_out as $row)
      <tr>
        <td>{{ $row->nombres }}</td>
        <td>{{ $row->nroencuesta }}</td>
        @foreach($row->respuestas as $respuesta)
        <td>{{ $respuesta->respuesta_id }}</td>
        @endforeach
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

        </form>
        
    </body>
</html>
