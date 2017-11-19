<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Empleado;
use PDF;
use App\Http\Repositories\EmpleadosRepository;

class GeneradorController extends Controller
{
    protected $empleadoRepo;
    public function __construct(EmpleadosRepository $empleadoRepo){
      $this->empleadoRepo = $empleadoRepo;
    }

    public function excel($nombre='', $dni='', $sede=''){
      	$empleados = $this->empleadoRepo->searchEmpleados(['nombre' => $nombre, 'dni' => $dni, 'sedes' => $sede]);
        
      	Excel::create('Laravel Excel', function($excel) use($empleados) {
            $excel->sheet('Productos', function($sheet) use($empleados) {
                $sheet->fromArray($empleados);
            });
        })->export('xls');

    }

    public function pdf($nombre='', $dni='', $sede=''){
      $empleados = $this->empleadoRepo->searchEmpleados(['nombre' => $nombre, 'dni' => $dni, 'sedes' => $sede]);     
      $pdf = PDF::loadView('pdf.pdf', compact('empleados'));
        return $pdf->download('pdf.pdf');
    }
}
