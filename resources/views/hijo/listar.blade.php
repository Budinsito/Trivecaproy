
<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
<!-- Optional theme -->
<link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<TITLE>Listado de Hijos</TITLE>

 <H1><CENTER>LISTADO DE HIJOS</CENTER></H1> 



<form class="form-inline" action="{{ route('listarhijo') }}" method="get">
 {{ csrf_field() }}
  <div class="form-group"> 
   
<input type="text" class="form-control" id="exampleInputName2" name="txtapoderado" placeholder="Buscar por apoderado" > 
  </div>
  
  <div class="form-group">  
  <br> <br>
</div>
  
<input type="text" class="form-control" id="exampleInputEmail2" name="txtApeHijos" placeholder="Buscar por Apellido" >
  </div>
  <button type="submit" class="btn btn-primary">Buscar</button>

<!--  <a 
      href="{{ route('generateExcelHijos',  
            [
                !empty($_GET['txtapoderado']) ? $_GET['txtapoderado'] : 'vacio', 
                !empty($_GET['txtApeHijos']) ? $_GET['txtApeHijos'] : 'vacio',
                 ]) }}"
class="btn btn-success"  >Excel</a>-->


<a 
      href="{{ route('exporxcelhijo',  
            [
                !empty($_GET['txtapoderado']) ? $_GET['txtapoderado'] : 'vacio', 
                !empty($_GET['txtApeHijos']) ? $_GET['txtApeHijos'] : 'vacio',
                 ]) }}"
class="btn btn-success"  >Excel</a>

</form>




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
   @if($hijos) @foreach($hijos as $data)
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