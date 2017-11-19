<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ruta para Empleados
Route::get('empleado/create','EmpleadoController@create')->name('createEmpleado');
Route::get('empleado/store','EmpleadoController@store')->name('getsaveEmpleado');
Route::post('empleado/store','EmpleadoController@store')->name('saveEmpleado');
Route::get('search/empleado','EmpleadoController@search')->name('searchEmpleado'); 
Route::get('empleado/listar','EmpleadoController@listar')->name('listarEmpleado');
Route::get('empleado/edit/{id}','EmpleadoController@edit')->name('ModifEmpleado');
Route::get('empleado/listEditemp','EmpleadoController@ListEditempleado')->name('getlistModifEmpleado');
Route::get('empleado/edit','EmpleadoController@devuelveEmpleadoxDni')->name('devuelveEmpleadoxDni');
Route::get('empleado/edit','EmpleadoController@update')->name('updateEmpleadoxDni');
Route::get('empleado/errordni','EmpleadoController@store')->name('validadni');

// Ruta para Hijos
Route::get('hijo/listar','hijoController@listar')->name('listarhijo'); 
Route::get('hijo/create','HijoController@create')->name('createHijo'); 
Route::post('hijo/store','HijoController@store')->name('saveHijo');
Route::get('hijo/store','HijoController@gethijos')->name('getsaveHijo');
Route::get('hijo/listahijos/{id}','HijoController@listahijos')->name('listahijosHijo');
Route::get('hijo/addhijo/{id}','HijoController@Agregarhijos')->name('Agregarhijos');
Route::post('hijo/addhijo/{id}','HijoController@Grabanuevohijo')->name('Grabanuevohijo');
Route::get('hijo/edit','HijoController@update')->name('updateHijo');
Route::get('hijo/edit/{id}','HijoController@edit')->name('editHijo');
Route::get('hijo/exportexcel/{txtapoderado?}/{txtApeHijos?}','HijoController@exportaexcel')->name('exporxcelhijo');



//EXCEL de empleados
Route::get('reporte/excel/{nombre?}/{dni?}/{sede?}','GeneradorController@excel')->name('generateExcel');

//EXCEL de Hijos
Route::get('reporte/excelHijos/{txtapoderado?}/{txtApeHijos?}','GeneradorHijoController@excelHijos')->name('generateExcelHijos');

//PDF
Route::get('reporte/pdf/{nombre?}/{dni?}/{sede?}','GeneradorController@pdf')->name('generatePdf');

// Ruta para Entrevistas
Route::get('encuesta/climalaboral','PreguntaController@index')->name('climalaboralempleado');
Route::post('encuesta/climalaboral','ClimalaboralController@store')->name('storeclimalaboralempleado');
Route::get('encuesta/climalaboral','ClimalaboralController@listar')->name('listarclimalaboralempleado');
Route::get('encuesta/climalaboral','ClimalaboralController@create')->name('createclimalaboralempleado');
Route::get('encuesta/listar','ClimalaboralController@listar')->name('listarPreguntaempleado');
Route::post('encuesta/listar','ClimalaboralController@listar')->name('listarPreguntaempleado');
Route::get('encuesta/listado','ClimalaboralController@store')->name('storePreguntaempleado');
Route::get('encuesta/finalizar','ClimalaboralController@finalizar')->name('storePreguntas');
Route::get('encuesta/reportepdfxsede','ClimalaboralController@reportepdf_create')->name('reportepdf_create');
Route::get('encuesta/imprimirpdfxsede/{id?}','ClimalaboralController@Reportpdfxsede_envio')->name('Reportpdfxsede_envio');




Route::get('encuesta/listapreguntas','PreguntaController@ListPreguntas')->name('ListPreguntas');
Route::get('encuesta/editpregunta/{id?}','PreguntaController@editPregunt')->name('editnewpregunta');
Route::get('encuesta/update','PreguntaController@update')->name('updpregunt');
Route::get('encuesta/listado','ClimalaboralController@imprimirpdf')->name('pdfencuesta');
Route::get('encuesta/imprimirpdf','ClimalaboralController@imprimirpdf2')->name('pdfencuesta2');
Route::get('encuesta/mensajeagregado','ClimalaboralController@llamamensaje')->name('mensajeagregado');

Route::get('encuesta/Reporte2climalaboral','ClimalaboralController@Reporte2Climalaboral')->name('Reporte2cont');

 
Route::get('encuesta/tablareporte/{nombre?}','ClimalaboralController@ExportarExcel')->name('exportclimalaboral');
Route::get('encuesta/reporteclimalaboral/{nombre?}','ClimalaboralController@Reporteclimalaboral')->name('Reportclimalaboral');
Route::get('encuesta/Reporte2climalaboral/{selectSede?}/{txtanio?}','ClimalaboralController@report3climalaboral')->name('exportexcelCL');

