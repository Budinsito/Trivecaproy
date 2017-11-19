<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <table class="table table-striped" style="overflow: auto; height: 100px;">
    <thead>
      <tr>
        <th >Sede</th>
        <th >Nro Encuesta</th>
        
 
        @foreach($Preguntas as $pregunta)
        <th>Pgta {{ $pregunta->nropregunta }} - {{ $pregunta->inicial }}</th>
        @endforeach
     
      </tr>
    </thead>
    <tbody>
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
    </body>
</html>
