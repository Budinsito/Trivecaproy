<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hijo;
use App\Empleado;
use App\Sexo;
use App\Http\Repositories\HijosRepository;
use App\Http\Requests\ValidateHijos;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;




class HijoController extends Controller{

    protected $hijoRepo;
    
    public function __construct(HijosRepository $hijoRepo){
      $this->hijoRepo = $hijoRepo;
    } 
  

 public function create() {

  $sexos = Sexo::orderby('nombres', 'asc')->get();
  
  return view('hijo/create',compact('sexos'));
 }

 
 
 
 public function edit($id) {
     $sexos = Sexo::orderby('nombres', 'asc') -> get();

     $hijos = Hijo::where('id', '=', $id) -> first();

     //      dd($hijos);

     return view('/hijo/edit', compact('id', 'sexos', 'hijos'));
     //  echo $id;

 }
 
 public function update(Request $request) {
    
     
$hijos= Hijo::where('id','=',$request['txtid'])->first();
//  dd($hijos);
 if($hijos){
      $hijos->nombres = mb_strtoupper($request['txtnombre']);
      $hijos->apellidos = mb_strtoupper($request['txtapellidos']);
     $hijos->fnacimiento = $request['txtfnacimiento'];
     $hijos->dni = $request['txtdni'];  
     $hijos->id_sexo = $request['cmbSexo'];
     $hijos->save();
        
  }
  
  
 return view('hijo/mensupdate');
//return redirect()->route('updateHijo');
 }
 

 public function gethijos() {
     $sexos = Sexo::orderby('nombres', 'asc')->get();
     return view('hijo/create',compact('sexos'));
 }

 public function store(request $request) {
    
   for ($i = 0; $i < count($request['Nombre']); $i++) {
         $hijo = new hijo;
         //echo "hijo" .$request['Nombre'][$i]." ".$request['Apellido'][$i]."<br>";
         $hijo -> nombres = mb_strtoupper($request['Nombre'][$i]);
         $hijo -> apellidos = mb_strtoupper($request['Apellido'][$i]);
         $hijo -> dni = $request ['DNI'][$i];
         $hijo -> fnacimiento = date('Y-m-d', strtotime($request['FechaNacimiento'][$i]));;
         $hijo -> id_sexo= $request['cmbSexo'][$i];

        // $hijo -> empleado_id = '1';
         $hijo-> empleado_id=$request['id_empleado'];

        // dump($request['id_empleado']);
         //dd($request->all());
         $hijo -> save();

         // Me limpia la sesion
         $request->session()->forget('key');
   // Fin de me limpia la sesion
     }

return view('empleado/store');
 }




 public function listar(Request $request) {
        
//dd($request->all());ok

        $hijos = $this->hijoRepo->BuscaHijos($request->all());  
        //dd($hijos);
      return view('hijo/listar', compact('hijos')); 
    }  



    public function listahijos($id) { 
 
       
// Me busca todos los campos de la tabla empleado por el Id que recibo del get
$padre = empleado::where('id', $id)->first();

//$fnachijo = hijo::where('id', $id)->first();
//
//$Anionac=  substr($fnachijo -> fnacimiento, 0, 4);  //Me captura el año de la fecha
//$Mesnac=  substr($fnachijo -> fnacimiento, 5, 2);  //Me captura el mes de la fecha
//$dianac = substr($fnachijo -> fnacimiento, 8, 2);  //Me captura el dia de la fecha
//
//
//$edadact = Carbon::createFromDate($Anionac,$Mesnac,$dianac)->age; 
//$edadact= Carbon::now();
$hijoempleado=Hijo::select('hijos.id as id','hijos.nombres as Nombres',
'hijos.apellidos as Apellidos','hijos.fnacimiento as fnacimiento',
'empleados.nombres as NomEmpleado','empleados.apellidos as ApeEmpleado',
'hijos.dni', 'hijos.id_sexo','sexos.nombres as sexohijo','hijos.dni as DNI')
->join('empleados','empleados.id','=','hijos.empleado_id')
->join('sexos','sexos.id','=','hijos.id_sexo')
->where('hijos.empleado_id', $id)->get();
//dd($edadact);
return view('hijo/listahijos',compact('hijoempleado','padre','id'));

   }
    
  
  
    public function Agregarhijos($id)  { 
       $sexos = Sexo::orderby('nombres', 'asc')->get();

        $empleados = empleado::where('id', $id)->first();
//        dd($id);
    return view('hijo/addhijo', compact('empleados','id','sexos'));
        
    }
    
    public function Grabanuevohijo(request $request) {
        
         $hijos = new Hijo;
        $hijos->dni = $request['txtdni'];
        $hijos->nombres = mb_strtoupper($request['txtnombre']);
        $hijos->apellidos = mb_strtoupper($request['txtapellidos']);
        $hijos->FNacimiento = $request['txtfnacimiento'];
        $hijos->id_sexo = $request['cmbSexo'];
         $hijos->empleado_id = $request['txtid'];
         $hijos->save();
//         return redirect()->route('getlistModifEmpleado');
          return view('hijo/mensagregado');
    }

public function exportaexcel(request $request, $txtapoderado = 'vacio', $txtApeHijos = 'vacio') {
    $request['txtapoderado'] = $txtapoderado;
    $request['txtApeHijos'] = $txtApeHijos;
    
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
     
    
                   
Excel::create('Report', function($excel) use ($data_out){
            $excel->sheet('Reporte', function($sheet) use ( $data_out) {
                $sheet->loadView('hijo.exportexcel', array( 'data_out' => $data_out));
            });
        })->export('xls');
       
    }

 }


      
