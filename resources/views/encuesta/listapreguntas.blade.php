<!DOCTYPE html>
<html lang="en">
<head>
  <title>Listado de Preguntas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Editor de Preguntas</h2>
  <p>Seleccione la pregunta a editar por favor</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th style="visibility: hidden">Id</th>
        <th>Nro Pregunta</th>
        <th>Pregunta</th>
        <th>Competencia</th>
        <th>Seleccionar</th>
      </tr>
    </thead>
    <tbody>
         @if($preg) @foreach($preg as $data)
      <tr>
        <td style="visibility: hidden">{{$data->id}}</td>
        <td>{{$data->nropregunta}}</td>
        <td>{{$data->pregnom}}</td>
         <td>{{$data->competencia}}</td>
        <td><a class="btn btn-success" href="../encuesta/editpregunta/{{$data->id}}"  role="button">Editar</a> </td>

      </tr>
    @endforeach @endif
      
     
    </tbody>
  </table>
</div>
 
</body>
</html>
