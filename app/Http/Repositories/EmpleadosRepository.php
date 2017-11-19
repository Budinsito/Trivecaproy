<?php 
namespace App\Http\Repositories; 

use App\Sede;
use App\Empleado;
use App\Sexo;

class EmpleadosRepository
{
	public function getSedes(){
		return Sede::orderby('nombres', 'asc')->get();
	}

	public function getEmpleados(){

        return Empleado::select('sedes.nombres as sede','dni','empleados.id','empleados.apellidos', 
                'empleados.nombres' ,  'empleados.FNacimiento', 'empleados.direccion', 'empleados.telefono', 
                'empleados.celular', 'empleados.email','sexos.nombres as sexoemp',
                'nivelacademico.nombres as nivelacademico' , 'profesion.nombres as profesion', 
                'empleados.fgobtenido', 'estadocivil.nombres as estadocivil','empleados.nhijos' ,
                'empleados.nomcontacto', 'empleados.dircontacto', 'empleados.telecontacto', 
                'empleados.celucontacto', 'empleados.emailcontacto', 'tipoparentesco.nombres as tipoparentesco',
                'cargos.nombres as cargos','empleados.anioexpe','empleados.mesexpe')
                
       		->join('sedes', 'sedes.id', '=', 'empleados.sede_id') //-> get();
           	->join('nivelacademico', 'nivelacademico.id', '=', 'empleados.nacademico_id')
           	->join('profesion', 'profesion.id', '=', 'empleados.profesion_id')
           	->join('estadocivil', 'estadocivil.id', '=', 'empleados.estadocivil_id')
           	->join('tipoparentesco', 'tipoparentesco.id', '=', 'empleados.tipparentesco_id')
              ->join('sexos', 'sexos.id', '=', 'empleados.id_sexo')
                  ->leftJoin('cargos', 'cargos.id', '=', 'empleados.cargo_id')
            ->where('empleados.estado','=','A')
           	->get();
	}

	public function searchEmpleados($request){

        $query = Empleado::select('sedes.nombres as sede','dni','empleados.id','empleados.apellidos', 
                'empleados.nombres' ,  'empleados.FNacimiento', 'empleados.direccion', 'empleados.telefono', 
                'empleados.celular', 'empleados.email','sexos.nombres as sexoemp',
                'nivelacademico.nombres as nivelacademico' , 'profesion.nombres as profesion', 
                'empleados.fgobtenido', 'estadocivil.nombres as estadocivil','empleados.nhijos' ,
                'empleados.nomcontacto', 'empleados.dircontacto', 'empleados.telecontacto', 
                'empleados.celucontacto', 'empleados.emailcontacto', 'tipoparentesco.nombres as tipoparentesco',
                'cargos.nombres as cargos','empleados.anioexpe as Años_experiencia','empleados.mesexpe as Meses_Experiencia')
                
       		->join('sedes', 'sedes.id', '=', 'empleados.sede_id') //-> get();
           	->join('nivelacademico', 'nivelacademico.id', '=', 'empleados.nacademico_id')
           	->join('profesion', 'profesion.id', '=', 'empleados.profesion_id')
           	->join('estadocivil', 'estadocivil.id', '=', 'empleados.estadocivil_id')
           	->join('tipoparentesco', 'tipoparentesco.id', '=', 'empleados.tipparentesco_id')
              ->join('sexos', 'sexos.id', '=', 'empleados.id_sexo')
                  ->leftJoin('cargos', 'cargos.id', '=', 'empleados.cargo_id');
        
        if(!empty($request['nombre']) && $request['nombre'] !== 'vacio'){
        	$query->where('empleados.nombres', 'like', "%".$request['nombre']."%");
        } 
 
        if(!empty($request['dni']) && $request['dni'] !== 'vacio'){
        	$query->where('dni', '=', $request['dni']);
        }

        if(!empty($request['sedes']) && $request['sedes'] !== 'vacio'){
        	$query->where('sede_id', $request['sedes']);	
        }
        return $query->get(); 
	}
}

?>