<link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
<!-- Optional theme -->
<link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">



<html>
<TITLE>Lista de Empleados</TITLE>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

    <H1><CENTER>  LISTA DE EMPLEADOS</CENTER>  </H1>
    <BR> </BR>

    <form class="form-inline" action="{{ route('searchEmpleado') }}"  method="get">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" name="nombre" id="txtBNombre" placeholder="Ingrese Nombre">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="dni" id="txtbDNI" placeholder="Ingrese DNI">
        </div>

        <div class="form-group">

            @if($sedes)
            <select name="sedes" class="form-control">
                <option value="">Seleccione Sede</option>
                @foreach($sedes as $data)
                <option value="{{ $data->id}}">{{ $data->nombres}}</option>
                @endforeach

            </select>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('generateExcel',  
            [
                !empty($_GET['nombre']) ? $_GET['nombre'] : 'vacio', 
                !empty($_GET['dni']) ? $_GET['dni'] : 'vacio', 
                !empty($_GET['sedes']) ? $_GET['sedes'] : 'vacio'
            ]) }}"


             class="btn btn-success">Excel</a>

       <!-- <a href="{{ route('generatePdf',
            [
                !empty($_GET['nombre']) ? $_GET['nombre'] : 'vacio', 
                !empty($_GET['dni']) ? $_GET['dni'] : 'vacio', 
                !empty($_GET['sedes']) ? $_GET['sedes'] : 'vacio'
            ]) }}" class="btn btn-success">Pdf</a>-->
    </form>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive"  style="overflow: auto; height: 450px;">
                    <table class="table users table-hover">
                        <thead>

                            <tr id="miTablaPersonalizada">

                            
                                <th>Sede</th>
                                <th>DNI</th>
                                 <th>Apellidos Empleado</th>
                                <th>Nombres Empleado</th>
                               
                                <th>Fecha Nacimiento</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                  <th>Grado Academico</th>
                                  <th>Profesión</th>
                                  <th>Cargos</th>
                                  <th>Años experiencia</th>
                                  <th>Meses experiencia</th>
                                   <th>Fecha Grado Obtenido</th>
                                     <th>Estado Civil</th>
                                <th># de Hijos</th>
                              
                               
                                 <th>Datos de Pareja</th>
                                <th>Dirección de Pareja</th>
                                <th>Telefono Contacto</th>
                                <th>Celular Contacto</th>
                                <th>Email Contacto</th>
                                <th>Tipo Parentesco</th>
                                <th><center>Detalles de Hijos</center></th>
                                    <th style="visibility:hidden;">Id</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($empleados) @foreach($empleados as $data)
                            <tr> 

                                
                                <td> {{$data->sede}}</td>
                                <td>{{$data->dni}}</td>
                                <td>{{$data->apellidos}}</td>
                                <td>{{$data->nombres}}</td>
                                
                                <td> {{$data->FNacimiento}}</td>
                                <td> {{$data->direccion}}</td>
                                <td> {{$data->telefono}}</td>
                                <td> {{$data->celular}}</td>
                                <td> {{$data->email}}</td>
                                <td> {{$data->sexoemp}}</td>
                                <td> {{$data->nivelacademico}}</td>
                                 <td> {{$data->profesion}}</td>
                                 <td> {{$data->cargos}}</td>
                                 <td> {{$data->anioexpe}}</td>
                                 <td> {{$data->mesexpe}}</td>
                                 
                                   <td> {{$data->fgobtenido}}</td>
                                   <td> {{$data->estadocivil}}</td>
                                <td> {{$data->nhijos}}</td>
                              
                               
                                
                                <td> {{$data->nomcontacto}}</td>
                                <td> {{$data->dircontacto}}</td>
                                <td> {{$data->telecontacto}}</td>
                                <td> {{$data->celucontacto}}</td>
                                <td> {{$data->emailcontacto}}</td>
                                <td> {{$data->tipoparentesco}}</td>


                               <td><center> <a class="btn btn-success" href="../hijo/listahijos/{{$data->id}}" target="_blank" role="button">Reporte  </a></center></td> 

                                <td style="visibility:hidden;"> {{$data->id}}</td>


                    


                            </tr>

                            @endforeach @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   <!-- action("HijoController@listahijos")


