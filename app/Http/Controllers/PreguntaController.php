<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competencia;
use App\Pregunta;
use App\Detalleclima;
use Jenssegers\Date\Date;

class PreguntaController extends Controller
{
    

public function create(){
	  $competencias = Competencia::all();
return view('encuesta/newpregunta',compact('competencias'));
}


public function store(){

	
//$hoy = date("Y");

//$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

//
//$pregunta=new Pregunta;
//$pregunta->nombre = $request['txtpregunta'];
//$pregunta->nropregunta = $request['txtnro'];
//$pregunta->competencia_id= $request['selectcompe'];
////$pregunta->anio= $hoy ;
////$pregunta->mespreg= $meses[date('n')-1] ;
//$pregunta->estado= "A";
 
// //dd($pregunta);
//
// $pregunta->save();
////dd($meses[date('n')-1]);
//
//
// return redirect()->back();
}

public function editPregunt($id) {
    
//    dd($id);
    $preg = Pregunta::select('preguntas.id','preguntas.nropregunta','preguntas.nombre as pregnom','competencias.nombre as competencia')
       	->join('competencias', 'competencias.id', '=', 'preguntas.competencia_id')
          ->where('preguntas.nropregunta',$id)->first();
return view('encuesta/editpregunta',compact('preg'));
}

public function ListPreguntas() {
    
  $preg = Pregunta::select('preguntas.id','preguntas.nropregunta','preguntas.nombre as pregnom','competencias.nombre as competencia')
       	->join('competencias', 'competencias.id', '=', 'preguntas.competencia_id')->get();
//          ->where('preguntas.nropregunta',$id)->get();
return view('encuesta/listapreguntas',compact('preg'));
// dd($preg);
}

public function update(request $request) {
    
//    dd($request->all());
    
$pregunta=Pregunta::find($request['txtnropreg']);

if ($pregunta){
    
    $pregunta->nombre 		= $request['txtpregunta'];
    $pregunta->save();
    
}

return redirect()->route('ListPreguntas');
    
}
}
