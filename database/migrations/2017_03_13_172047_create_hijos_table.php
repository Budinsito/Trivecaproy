<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

Schema::create('hijos', function(Blueprint $table){

    $table->increments('id');
    $table->string('nombres','100');
    $table->string('apellidos','100');
     $table->integer('DNI','8');
      $table -> enum('sexo', ['masculino', 'femenino']) -> required();
    $table->date('fnacimiento')->nullable();

    $table->integer('empleado_id')->unsigned();
    $table->foreign('empleado_id')->references('id')->on('empleados');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hijos');
    }
}
