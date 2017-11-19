<html>

<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link href="{{ asset('css/Template/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Optional theme -->
    <link href="{{ asset('css/Template/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Template/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>Industrias Triveca</title>
</head>

<body>
    <table width="100%" border="1">
        <tr>
            <td style="text-align: left"><img src="{{ asset('imagenes/indice.png') }}" width="224" height="48" alt="" /></td>
            <td style="text-align: center; font-weight: bold; font-size: 24px;">EVALUACION DE CLIMA LABORAL</td>
        </tr>

 </table>
    
    <table width="100%" border="1" align="center">
        <tr>
            <td style="font-weight: bold">
                <CENTER>FECHA :</CENTER>
            </td>
            <td style="font-weight: bold">
                <CENTER>17/07/17</CENTER>
            </td>
            <td style="font-weight: bold">
                <CENTER>VERSION : 01</CENTER>
            </td>
            <td style="font-weight: bold">
                <CENTER>01</CENTER>
            </td>
            <td style="font-weight: bold">
                <CENTER>CODIGO</CENTER>
            </td>
            <td style="font-weight: bold">
                <CENTER>F-RH-008</CENTER>
            </td>

    </table>
 
 <table width="100%" border="0">

  <tr>

    <td style="text-align: justify">A continuación encontrará una serie de enunciados relacionados  con situaciones o características de su ámbito laboral, cada una tiene 4 opciones para responder de acuerdo a lo que describa mejor su relación /experiencia con  Industrias Triveca. Lea cuidadosamente cada pregunta y coloque su respuesta de acuerdo a las siguientes opciones: </td>
   </tr>
</table>

    <table width="100%" border="0">

        @if($cabecerapdf_general) @foreach($cabecerapdf_general as $data)
        <tr>
            <td style="font-weight: bold">SUCURSAL : {{$data->sede}} </td>
            <td style="font-weight: bold">SEXO : {{$data->sexo}}</td>
            <td style="font-weight: bold">FECHA : {{$data->fecha}}</td>
        </tr>
        @endforeach @endif

        <tr>
            <td colspan="3" style="text-align: center"></td>
        </tr>
    </table>
    <table width="251" border="1" align="center">
        <tr>
            <td width="241" style="font-weight: bolder; text-align: center;">Leyenda de Respuestas</td>
        </tr>
        <tr>
            <td>1. Totalmente en Desacuerdo</td>
        </tr>
        <tr>
            <td>2. En Desacuerdo</td>
        </tr>
        <tr>
            <td>3. De Acuerdo</td>
        </tr>
        <tr>
            <td>4. Totalmente De Acuerdo</td>
        </tr>
    </table>

    </table>
    
    <table width="100%" border="1" align="left">
        <tr>
            <td><strong>Esta encuesta es de carácter ANÓNIMO.</strong></td>
            <td>
                <center>PUNTUACIÓN</center>
            </td>
        </tr>
        @if($cuerpopdf_general) @foreach($cuerpopdf_general as $data2)
        <tr> 
            <td><font size=1>{{$data2->pregunta}}</font></td>
 <td><center><font size=1>{{$data2->respuesta_id}}</font></center> </td>
        </tr>
        @endforeach @endif
    </table>

</body>

</html>