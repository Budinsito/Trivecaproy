<?php 
namespace App\Http\Repositories;

use App\Empleado;
use App\Hijo;
use Carbon\Carbon;

class HijosRepository
{

public function BuscaHijos($request){

//    $fnachijo = Hijo::select('hijos.fnacimiento')->first();
////
//$Anionac=  substr($fnachijo -> fnacimiento, 0, 4);  //Me captura el año de la fecha
//$Mesnac=  substr($fnachijo -> fnacimiento, 5, 2);  //Me captura el mes de la fecha
//$dianac = substr($fnachijo -> fnacimiento, 8, 2);  //Me captura el dia de la fecha
////
//$edadact = Carbon::createFromDate($Anionac,$Mesnac,$dianac)->age;


//dd($edadact);

$query=Hijo::select('hijos.nombres as Nombres','hijos.apellidos as Apellidos','hijos.fnacimiento as fnacimiento','empleados.nombres as NomEmpleado','empleados.apellidos as ApeEmpleado','hijos.dni','sexos.nombres as Sexohijo')
->join('empleados','empleados.id','=','hijos.empleado_id')
->join('sexos','sexos.id','=','hijos.id_sexo');

if(!empty($request['txtapoderado']) && $request['txtapoderado'] !== 'vacio'){
   $query->where('empleados.apellidos', 'like', "%" .$request['txtapoderado']."%");
        } 

if(!empty($request['txtApeHijos']) && $request['txtApeHijos'] !== 'vacio'){
      $query->where('hijos.apellidos', 'like', "%" .$request['txtApeHijos']."%"); 
        } 

        //return $query->get();
        $dataHijos = $query->get();
        $data_out = [];
        foreach($dataHijos as $key => $hijo){
            $data_out[$key] = $hijo;
            //2017-11-25 => [2017,11,25]
            /*$Anionac=  substr($fnachijo -> fnacimiento, 0, 4);  //Me captura el año de la fecha
            $Mesnac=  substr($fnachijo -> fnacimiento, 5, 2);  //Me captura el mes de la fecha
            $dianac = substr($fnachijo -> fnacimiento, 8, 2);  //Me captura el dia de la fecha
            //
            $data_out[$key]->edad  = Carbon::createFromDate($Anionac,$Mesnac,$dianac)->age;
             */
            
            list($anio,$mes,$dia) = explode("-",$hijo -> fnacimiento);
            $data_out[$key]->edad = Carbon::createFromDate($anio,$mes,$dia)->age;;
            
        }
        
//        dd($data_out);
        return $data_out;
        
        //$data = [1,2,3,4,5];
        /*
        foreach($data as $k=>$v){
            echo $k." - ".$v."<br/>";
        }
         ///////////////////////
         * 0 - 1
         * 1 - 2
         * 2 - 3  
         
                   */
}
}
?>