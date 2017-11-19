<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Hijo;
use PDF;
use App\Http\Repositories\HijosRepository;

class GeneradorHijoController extends Controller
{

protected $hijoRepo;
 public function __construct(HijosRepository $hijoRepo){
      $this->hijoRepo = $hijoRepo;
    }

  public function excelHijos($apoderado='', $apehijos=''){

  
      	$hijos = $this->hijoRepo->BuscaHijos(['txtapoderado' => $apoderado, 'txtApeHijos' => $apehijos]);
        
      	Excel::create('Laravel Excel', function($excel) use($hijos) {
            $excel->sheet('Productos', function($sheet) use($hijos) {
                $sheet->fromArray($hijos);
            }); 
        })->export('xls'); 

    } 


    }