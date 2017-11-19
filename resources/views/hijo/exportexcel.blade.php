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
<table class="table table-hover">
  <thead>
    <tr>
        <th>Trabajador</th>
      <th>Apellidos</th>
      <th>Nombres</th>
      <th>DNI</th>
      <th>Fecha de Nacimiento</th>
      <th>Edad</th>
      <th>Sexo</th>
    </tr>
  </thead>
  <tbody>
   @if($data_out) @foreach($data_out as $data)
    <tr>
        
       
      <td>{{$data->ApeEmpleado}}  {{$data->NomEmpleado}} </td>
     <td>{{$data->Apellidos}}</td>
     <td>{{$data->Nombres}}</td>
      <td>{{$data->dni}}</td>
      <td>{{$data->fnacimiento}}</td>
      <td>{{$data->edad}}</td>
     <td>{{$data->Sexohijo}}</td>
      



    </tr>
     @endforeach @endif
  </tbody>
</table>
    </body>
</html>
