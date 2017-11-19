<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateEmpleado extends FormRequest
{
    
    public function authorize() 
    {
        return true;
    }

    
    public function rules()
    {
        return [

            'txtDni' => 'required',
            'txtNombre' => 'required',
            'txtApe' => 'required',
            'txtDir' => 'required',
            'txtCelu' => 'required',
            'txtCorreo' => 'required',
            'txtNom2' => 'required',
            'txtDir2' => 'required',
             'txtcelu2' => 'required',
            'txtemail2' => 'required',
            'cmbSede' => 'required',
            'cmbEstadocivil' => 'required',
            'cmbSexo'  => 'required',
            'cmbParentesco' => 'required',
            'cmbProfesion' => 'required',
            'cmbAcademico' => 'required',
            'cmbCargo' => 'required'


        ]; 
    }
}
