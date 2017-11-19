<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sede;
use App\Estadocivil;
use App\Profesion;
use App\nivelacademico;
use App\Empleado;
use App\Sexo;
use App\Tipoparentesco;
use App\Cargo;

use App\Http\Repositories\EmpleadosRepository;
use App\Http\Requests\ValidateEmpleado;

class EmpleadoController extends Controller {

    protected $empleadoRepo;
    public function __construct(EmpleadosRepository $empleadoRepo){
      $this->empleadoRepo = $empleadoRepo;
    }


    public function create() {
        // Me jala los campos de los combos
        $sedes = $this->empleadoRepo->getSedes();
        $estadociviles = Estadocivil::orderby('nombres', 'asc')->get();
        $profesiones = Profesion::orderby('nombres', 'asc')->get();
        $nivelacademico = nivelacademico::orderby('nombres', 'asc')->get();
        $tipoparentesco = tipoparentesco::orderby('nombres', 'asc')->get();
        $sexos = Sexo::orderby('nombres', 'asc')->get();
        $cargos= Cargo::orderby('nombres', 'asc')->get();
        
 return view('empleado/create', compact('sedes', 'estadociviles', 'profesiones', 'nivelacademico', 'tipoparentesco','sexos','cargos'));
    }

    // Aqui termina 
    public function store(ValidateEmpleado $request) {
        $dia = $request['cmbDia'];
        $mes = $request['cmbMes'];
        $anio = $request['cmbAnio'];
        $fechaNac = $dia.
        '-'.$mes.
        '-'.$anio; 

        $empleado = new empleado;
        $empleado->dni = $request['txtDni'];
        $empleado->nombres = mb_strtoupper($request['txtNombre']);
        $empleado->apellidos = mb_strtoupper($request['txtApe']);
        $empleado->FNacimiento = date('Y-m-d', strtotime($fechaNac));
        $empleado->direccion = mb_strtoupper($request['txtDir']);
        $empleado->telefono = $request['txtFono'];
        $empleado->celular = $request['txtCelu'];
        $empleado->email = $request['txtCorreo'];
        $empleado->id_sexo = $request['cmbSexo'];
        $empleado->nhijos = $request['txtNhijos'];
        $empleado->nomcontacto = mb_strtoupper($request['txtNom2']);
        $empleado->dircontacto = mb_strtoupper($request['txtDir2']);
        $empleado->telecontacto = $request['txtFono2'];
        $empleado->celucontacto = $request['txtcelu2'];
        $empleado->emailcontacto = $request['txtemail2'];
        $empleado->fgobtenido = date('Y-m-d', strtotime($request['txtFuGradoObtenido']));
        $empleado->tipparentesco_id = $request['cmbParentesco'];
        $empleado->sede_id = $request['cmbSede'];
        $empleado->nacademico_id = $request['cmbAcademico'];
        $empleado->profesion_id = $request['cmbProfesion'];
        $empleado->estadocivil_id = $request['cmbEstadocivil'];
        $empleado->cargo_id = $request['cmbCargo'];
        $empleado->anioexpe = $request['txtanioexp'];
        $empleado->mesexpe = $request['txtmesexp'];
        
        $empleado->estado= "A";


//dd($request->all());

        //$vdni = $request['txtDni'];
   $buscadni = Empleado::select('dni')
   ->where('empleados.dni',"=", $request['txtDni'])->get();
         if ($buscadni->count()== 1) { 
//             dd($buscadni->count());
            return view('empleado/errordni');
//           
         }
         
         
        if ($request['txtNhijos'] == '0') { 
            $empleado->save(); 
            return view('empleado/store');
        } else {
            $empleado->save();
            
         
            
            $request->session()->put('key', ['id' => $empleado->id, 'nombres' => $empleado->nombres,
                'dni' => $empleado->dni
            ]);
            return redirect()->route('getsaveHijo');
        }
    }

    public function listar() {
        $sedes = $this->empleadoRepo->getSedes();
        $empleados = $this->empleadoRepo->getEmpleados();
return view('empleado/listar', compact('empleados', 'sedes'));
    }

    public function search(Request $request){
      $sedes = $this->empleadoRepo->getSedes();
   $empleados = $this->empleadoRepo->searchEmpleados($request->all());  
       //dd($request);
      return view('empleado/listar', compact('empleados', 'sedes')); 
    }

   public function ModifPersonal(Request $request){
  $sedes = $this->empleadoRepo->getSedes();
       $estadociviles = Estadocivil::orderby('nombres', 'asc')->get();
        $profesiones = Profesion::orderby('nombres', 'asc')->get();
        $nivelacademico = nivelacademico::orderby('nombres', 'asc')->get();
        $tipoparentesco = tipoparentesco::orderby('nombres', 'asc')->get();
        $sexos = Sexo::orderby('nombres', 'asc')->get();
        
      return view('empleado/edit', compact('sedes', 'estadociviles', 'profesiones', 'nivelacademico', 'tipoparentesco','sexos'));
   }
    
   
   
   
    
    
    public function  edit ($id) {
        
         $sedes = $this->empleadoRepo->getSedes();
       $estadociviles = Estadocivil::orderby('nombres', 'asc')->get();
        $profesiones = Profesion::orderby('nombres', 'asc')->get();
        $nivelacademico = nivelacademico::orderby('nombres', 'asc')->get();
        $tipoparentesco = tipoparentesco::orderby('nombres', 'asc')->get();
        $sexos = Sexo::orderby('nombres', 'asc')->get();
        $cargos= Cargo::orderby('nombres', 'asc')->get();
        $empleado=  Empleado::where('id','=',$id)->first();
        
        
//        return $id;

//dd($empleado);
        
  return view('empleado/edit', compact('empleado','sedes', 'estadociviles', 'profesiones', 'nivelacademico', 'tipoparentesco','sexos','cargos'));
       }
         

public function ListEditempleado(Request $request){
    
  $empleado=Empleado::select('sedes.nombres as sede','empleados.id','empleados.apellidos' ,'empleados.nombres',
        'dni','empleados.FNacimiento as FNacimiento', 'empleados.direccion as direccion', 'empleados.telefono', 
        'empleados.celular', 'empleados.email','sexos.nombres as sexoemp','nivelacademico.nombres as nivelacademico' , 
        'profesion.nombres as profesion', 'empleados.fgobtenido', 'estadocivil.nombres as estadocivil' ,
          'empleados.nhijos' ,'cargos.nombres as cargos','empleados.nomcontacto', 'empleados.dircontacto', 
          'empleados.telecontacto', 'empleados.celucontacto', 'empleados.anioexpe','empleados.mesexpe',
          'empleados.emailcontacto', 'tipoparentesco.nombres as tipoparentesco')
       		->join('sedes', 'sedes.id', '=', 'empleados.sede_id') //-> get();
           	->join('nivelacademico', 'nivelacademico.id', '=', 'empleados.nacademico_id')
           	->join('profesion', 'profesion.id', '=', 'empleados.profesion_id')
           	->join('estadocivil', 'estadocivil.id', '=', 'empleados.estadocivil_id')
           	->join('tipoparentesco', 'tipoparentesco.id', '=', 'empleados.tipparentesco_id')
                ->join('sexos', 'sexos.id', '=', 'empleados.id_sexo')
                ->leftjoin('cargos', 'cargos.id', '=', 'empleados.cargo_id')
          ->where('dni',$request['txtdni'])->get();
//   dd($empleado);
     return view('empleado/listEditemp', compact('empleado'));
    
    
}
       
 public function devuelveEmpleadoxDni(request $request) {
         $empleado=  Empleado::find($request['txtDni']);
//         dd($empleado);
        
        return view('empleado/listEditemp', compact('empleado'));
        
    }
public function update(request $request){
    
    $empleado=  Empleado::where('dni','=',$request['etxtDni'])->first();
//  dd( $empleado);
  
  if($empleado){
      $empleado->nombres = mb_strtoupper($request['txtname']);
      $empleado->apellidos = mb_strtoupper($request['txtape']);
      $empleado->FNacimiento = $request['txtNaci'];
      $empleado->direccion = $request['txtdir'];
      $empleado->telefono = $request['txtFono'];
      $empleado->celular = $request['txtCelu'];
      $empleado->email = $request['txtCorreo'];
      $empleado->id_sexo = $request['cmbSexo'];
      $empleado->nhijos = $request['txtNhijos'];
      $empleado->nomcontacto = mb_strtoupper($request['txtNom2']);
      $empleado->dircontacto = mb_strtoupper($request['txtDir2']);
      $empleado->telecontacto = $request['txtFono2'];
      $empleado->celucontacto = $request['txtcelu2'];
      $empleado->emailcontacto = $request['txtemail2'];
      $empleado->fgobtenido = $request['txtFuGradoObtenido'];
      $empleado->tipparentesco_id = $request['cmbParentesco'];
      $empleado->sede_id = $request['selectSede'];
      $empleado->nacademico_id = $request['cmbAcademico'];
      $empleado->profesion_id = $request['cmbProfesion'];
      $empleado->estadocivil_id = $request['cmbEstadocivil'];
      $empleado->cargo_id = $request['cmbCargo'];
      $empleado->anioexpe = $request['txtanioexp'];
      $empleado->mesexpe = $request['txtmesesexp'];
       
      $empleado->save();
      
      
      
  }
  
   
    
  return redirect()->route('getlistModifEmpleado');
         
    
}

}