<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        


Schema::create('empleados', function(Blueprint $table) {

     $table -> increments('id');
     $table -> string('dni', '8') -> unique();
     $table -> string('nombres', '20') -> required();
     $table -> string('apellidos', '20') -> required();

     $table -> date('FNacimiento') -> required();
     $table -> string('direccion', '100') -> required();
     $table -> string('telefono', '12') -> nullable();
     $table -> string('celular', '20') -> nullable();
     $table -> string('email', '50') -> nullable();
     $table -> enum('sexo', ['masculino', 'femenino']) -> required();

     $table -> integer('nhijos') -> required();
     $table -> char('estado','1') -> required();

     //$table->enum('hijos',['si','no'])->required();

     $table -> string('nomcontacto', '50');
     $table -> string('dircontacto', '100');
     $table -> string('telecontacto', '12') -> nullable();
     $table -> string('celucontacto', '20') -> nullable();
     $table -> string('emailcontacto', '50') -> nullable();

     $table -> date('fgobtenido');

     $table -> integer('tipparentesco_id') -> unsigned();
     $table -> foreign('tipparentesco_id') -> references('id') -> on('tipoparentesco');

     $table -> integer('sede_id') -> unsigned();
     $table -> foreign('sede_id') -> references('id') -> on('sedes');

     $table -> integer('nacademico_id') -> unsigned();
     $table -> foreign('nacademico_id') -> references('id') -> on('nivelacademico');

     $table -> integer('profesion_id') -> unsigned();
     $table -> foreign('profesion_id') -> references('id') -> on('profesion');

     $table -> integer('estadocivil_id') -> unsigned();
     $table -> foreign('estadocivil_id') -> references('id') -> on('estadocivil');


$table -> integer('id_sexo') -> unsigned();
     $table -> foreign('id_sexo') -> references('id') -> on('sexos');


     $table -> timestamps();

 });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
