<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sexo;
use App\Sede;
use App\Pregunta;
use App\Respuesta; 
use App\cabeceraclima;
use App\Detalleclima;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;


class ClimalaboralController extends Controller
{
    
public function create(){

	
	// Me manda los datos al combo
	$sexos = Sexo::all();
	$sedes = Sede::orderby('nombres', 'asc')->get();

// Fin de listado de combos

return view('encuesta/climalaboral',compact('sexos','sedes'));

	}


public function listar(Request $request){
	$respuestas = Respuesta::all(); 
	$numero = 15;
	$pagina = $request->input('pagina');
	$select = $request->input('selectbasic');
	/*Limpiamos la informacion de la sesion*/
	if(empty($pagina))$request->session()->put('respuestas',[]);
	/*Guardamos informacion de el llenado del formulario*/
	if(count($select)>0){
		foreach($select as $idpregunta=>$idrespuesta){
			$request->session()->push('respuestas',[$idpregunta=>$idrespuesta]);
		}
	}

	/*Extraemos información del grupo de pregutnas de la página actual.*/

	$preguntas = Pregunta::select('Preguntas.nropregunta', 'Preguntas.nombre', 'Preguntas.id')->offset($pagina*$numero)->limit($numero)->get();
	$sig_pagina = $pagina + 1;
	return view('encuesta/listado', compact('preguntas', 'respuestas','sig_pagina'));
}


public function finalizar(Request $request){
	$array_respuestas = $request->session()->get('respuestas');
	$idencuesta = $request->session()->get('key')['id'];

foreach($array_respuestas as $respuesta){
		$idpregunta = key($respuesta);
		$idrespuesta = $respuesta[$idpregunta];
		//echo $idpregunta." ---- ".$idrespuesta." <br/>";
		$detalleclima = new Detalleclima;
		$detalleclima->pregunta_id = $idpregunta;
		$detalleclima->respuesta_id = $idrespuesta;
		$detalleclima->cabecera_id = $idencuesta;
		$detalleclima->save();
               }
return redirect()->route('pdfencuesta2');
     //	exit();
}

public function llamamensaje() {
   return view('encuesta/mensajeagregado');
}


public function imprimirpdf2(request $request) {
$idencuesta = $request->session()->get('key')['id'];

$fidencuesta=$countcabecera = sprintf('%04d', $idencuesta);

$cabecerapdf=DB::select('call pdfcabecera_encuestal(?)',array($fidencuesta));
$cuerpopdf=DB::select('call pdfcuerpo_encuestal(?)',array($fidencuesta));

//dd($cabecerapdf);

//return view('encuesta/imprimirpdf', compact('cuerpopdf','cabecerapdf','fidencuesta'));

$pdf = PDF::loadView('encuesta.imprimirpdf',['cabecerapdf' => $cabecerapdf],['cuerpopdf' => $cuerpopdf]);

//dd($pdf);
  redirect('encuesta/mensajeagregado');
return $pdf->download('imprimir.pdf');


  }
  
  
public function store(request $request) {


$añoclim = date("Y"); // Me jala el año del sistema

// Me genera el numero de la pregunta
    $countcabecera = cabeceraclima::count();  // Me captura la cantidad de campos

    if ($countcabecera == 0) {

        $countcabecera = '0001';
    } else {

        $countcabecera = sprintf('%04d', cabeceraclima::count() + 1);

    }

       

    //echo $countcabecera;
$cabeceraclima=new cabeceraclima;

$cabeceraclima->nroencuesta = $countcabecera;
$cabeceraclima->anio = $añoclim;
$cabeceraclima->sede_id= $request['selectsede'];
$cabeceraclima->sexo_id= $request['selectsexo'];



$cabeceraclima->save();
//dd($cabeceraclima->id);


$idcabecera=$cabeceraclima->id;

//return view('encuesta/listado', compact('idcabecera'));

//return redirect()->route('listarPreguntaempleado',compact('idcabecera'));

       
$request->session()->put('key', ['id' => $idcabecera, 'nroexamen' => $countcabecera ]);




return redirect()->route('listarPreguntaempleado');




	}

        
        public function Reporteclimalaboral(request $request) {
            
            $Report=cabeceraclima::select('sedes.nombres','cabeceraclima.anio','cabeceraclima.nroencuesta','cabeceraclima.id')
            ->join('sedes','cabeceraclima.sede_id','=','sedes.id')
            //->join('detalleclima','detalleclima.cabecera_id','=','cabeceraclima.id')  
            //->join('preguntas','preguntas.id','=','detalleclima.pregunta_id')        
            //->join('competencias','competencias.id','=','preguntas.competencia_id')         
            ->where('cabeceraclima.anio',$request['nombre'])->get();
            //dd($Report);
            
            $Preguntas = cabeceraclima::select('preguntas.nropregunta','competencias.inicial')
                         ->join('detalleclima','detalleclima.cabecera_id','=','cabeceraclima.id')
                         ->join('preguntas','preguntas.id','=','detalleclima.pregunta_id')
                         ->join('competencias','competencias.id','=','preguntas.competencia_id')
                         ->where('cabeceraclima.anio',$request['nombre'])->distinct()->get();
//            dd($request);
            $data_out = [];
            foreach($Report as $key=>$sede){
               $data_out[$key] = $sede; 
               $data_out[$key]->respuestas = Detalleclima::select('respuesta_id')
                         //->join('detalleclima','detalleclima.cabecera_id','=','cabeceraclima.id')
                         //->join('preguntas','preguntas.id','=','detalleclima.pregunta_id')
                         //->join('respuestas','respuesta.id','=','detalleclima.respuesta_id')
                         ->where('cabecera_id',$sede->id)->get();
            }
//            dd($data_out);
            return view('encuesta/reporteclimalaboral',compact('data_out','Preguntas'));
            

        }
        
    public function ExportarExcel(request $request, $nombre = 'vacio') {
           
        if(empty($nombre) && $nombre == 'vacio'){
             $nombre= '2017';
        } 
        $request['nombre'] = $nombre;
// dd($request);
        $Report=cabeceraclima::select('sedes.nombres','cabeceraclima.anio','cabeceraclima.nroencuesta','cabeceraclima.id')
            ->join('sedes','cabeceraclima.sede_id','=','sedes.id')
            //->join('detalleclima','detalleclima.cabecera_id','=','cabeceraclima.id')  
            //->join('preguntas','preguntas.id','=','detalleclima.pregunta_id')        
            //->join('competencias','competencias.id','=','preguntas.competencia_id')         
            ->where('cabeceraclima.anio',$request['nombre'])->get();
            
        $Preguntas = cabeceraclima::select('preguntas.nropregunta','competencias.inicial')
                         ->join('detalleclima','detalleclima.cabecera_id','=','cabeceraclima.id')
                         ->join('preguntas','preguntas.id','=','detalleclima.pregunta_id')
                         ->join('competencias','competencias.id','=','preguntas.competencia_id')
                         ->where('cabeceraclima.anio',$request['nombre'])->distinct()->get();
        $data_out = [];
        
            foreach($Report as $key=>$sede){
               $data_out[$key] = $sede; 
               $data_out[$key]->respuestas = Detalleclima::select('respuesta_id')
                         //->join('detalleclima','detalleclima.cabecera_id','=','cabeceraclima.id')
                         //->join('preguntas','preguntas.id','=','detalleclima.pregunta_id')
                         //->join('respuestas','respuesta.id','=','detalleclima.respuesta_id')
                         ->where('cabecera_id',$sede->id)->get();
            }
       Excel::create('Report', function($excel) use ($data_out,$Preguntas,$Report){
            $excel->sheet('Reporte', function($sheet) use ( $data_out,$Preguntas,$Report) {
                $sheet->loadView('encuesta.tablareporte', array( 'data_out' => $data_out, 'Preguntas' => $Preguntas,'Report' => $Report));
            });
        })->export('xls');
         
        
       
    }
    
 public function Reporte2Climalaboral(request $request) {
     
     $sedes = Sede::orderby('nombres', 'asc')->get();
     $respuestas= Respuesta::all();
     
     
//      $respuestas=Respuesta::select('respuestas.nombres')->get();
//      //      dd($respuestas);
      
//       $preguntas = cabeceraclima::select('preguntas.nropregunta','competencias.inicial')
//                         ->join('detalleclima','detalleclima.cabecera_id','=','cabeceraclima.id')
//                         ->join('preguntas','preguntas.id','=','detalleclima.pregunta_id')
//                         ->join('competencias','competencias.id','=','preguntas.competencia_id')->distinct()->get();
////                         ->where('cabeceraclima.anio',$request['nombre'])->distinct()->get();

       $datos= DB::select("call reporteClimatotal(?)",array($request['selectSede']));
       
       $totales= DB::select("call DetallereporteTotalxSede(?,?)",array($request['selectSede'],'2017'));
//         $totales= DB::select("call DetallereporteTotalxSede('1')");    
//       dd($datos);
       
//       return view('encuesta/Reporte2climalaboral', compact('respuestas','preguntas','sedes','datos'));
//    dd($totales);
       return view('encuesta/Reporte2climalaboral', compact('datos','sedes','totales','respuestas'));
 }
 
public function report3climalaboral(request $request,$sede,$txtanio2) {
    $request['selectSede']=$sede;
    $request['txtanio2']=$txtanio2;
// dd($request);
 
 
  $datos= DB::select("call reporteClimatotal(?)",array($sede));
       
       $totales= DB::select("call DetallereporteTotalxSede(?,?)",array($sede, $txtanio2));
//return view('encuesta/tablareporte2', compact('datos','totales'));
 
 
Excel::create('Report', function($excel) use ($datos,$totales,$sede){
            $excel->sheet('Reporte', function($sheet) use ( $datos,$totales,$sede) {
                $sheet->loadView('encuesta.tablareporte2', array( 'datos' => $datos, 'totales' => $totales,'sede' => $sede));
            });
        })->export('xls');


}

public function reportepdf_create(request $request) {
    $sedes = Sede::orderby('nombres', 'asc')->get();
    
     $Tablareporte=cabeceraclima::select('cabeceraclima.id','cabeceraclima.nroencuesta','cabeceraclima.fecha','sexos.nombres')
            ->join('sexos','sexos.id','=','cabeceraclima.sexo_id')
                ->where('cabeceraclima.anio',$request['txtanio']) 
                ->where('cabeceraclima.sede_id',$request['cmbSede']) ->get();
   return view('encuesta/reportepdfxsede', compact('sedes','Tablareporte'));
    
}

public function Reportpdfxsede_envio($id) {
    
$cabecerapdf_general=DB::select('call pdfcabecera_reportegeneral(?)',array($id));
$cuerpopdf_general=DB::select('call pdfcuerpo_reportegeneral(?)',array($id));

//dd($cuerpopdf_general);

//return view('encuesta/imprimirpdf', compact('cuerpopdf','cabecerapdf','fidencuesta'));

$pdf = PDF::loadView('encuesta.imprimirpdfxsede',['cabecerapdf_general' => $cabecerapdf_general],['cuerpopdf_general' => $cuerpopdf_general]);

//dd($pdf);
//  redirect('encuesta/mensajeagregado');
return $pdf->download('imprimir.pdf');


//dd($id);
    
}


}