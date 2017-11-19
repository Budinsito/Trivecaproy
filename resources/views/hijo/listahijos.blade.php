

<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
<!-- Optional theme -->
<link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<TITLE>Lista de hijos por trabajadores</TITLE>

    <H1><CENTER>  LISTA DE HIJOS POR TRABAJADORES</CENTER>  </H1>
   
    
 
    

    <H2><CENTER> {{ $padre->nombres }}  {{ $padre->apellidos }}</CENTER> </H2>
    <H2><CENTER> DNI : {{ $padre->dni }}</CENTER> </H2>
    <br></br>

  

    <h3><a href="{{ route('Agregarhijos',$id) }}">Agregar Hijos</a></h3>
    <br></br>
<form class="form-horizontal" action="{{ route('Agregarhijos',$id) }}"  method="get">
<table class="table table-bordered">
  


  <th>Apellidos de Hijo</th>
  <th>Nombres de Hijo</th>
   <th>Fecha de Nacimiento</th>
    <th>DNI</th>
    <th>Sexo</th>   
  
  @if($hijoempleado) @foreach($hijoempleado as $data) 
  <tr>
   <td> {{$data->Apellidos}}</td>
  <td> {{$data->Nombres}}</td> 
  <td> {{$data->fnacimiento}}</td>
  <td> {{$data->DNI}}</td>
  <td> {{$data->sexohijo}}</td>

  
  
 <td><a class="btn btn-success" href="../../hijo/edit/{{$data->id}}" target="_blank" role="button">Editar</a> </td>


  </tr>
 @endforeach @endif                      
</table>



    
</form>
 <!--{{ dd($hijoempleado) }} -->
