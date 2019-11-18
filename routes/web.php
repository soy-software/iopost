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

// welcome
Route::get('/', 'Estaticas@index')->name('welcome');
// obtener cantones y parroquias
Route::post('/obtener-cantones-x-provincia', 'Estaticas@obtenerCantonesXprovincia')->name('obtenerCantonesXprovincia');
Route::post('/obtener-parroquias-x-canton', 'Estaticas@obtenerParroquiasXcanton')->name('obtenerParroquiasXcanton');
// inscripciones
Route::get('/inscripcion-en-linea/{corte}', 'Estaticas@inscripcion')->name('incripcion');
Route::post('/inscripcion-procesar', 'Estaticas@procesarInscripcion')->name('procesarInscripcion');

// A:Deivid
// D:inscripcion en linea



Auth::routes(['register' => false,'verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['estado','verified', 'auth'])->group(function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    // A:Deivid
    // D:Gestion de usuarios
    Route::namespace('Usuarios')->group(function () {
        Route::get('/usuarios/{rol?}', 'Usuarios@index')->name('usuarios');
        Route::get('/nuevo-usuario', 'Usuarios@nuevo')->name('nuevoUsuario');
        Route::post('/guardar-usuario', 'Usuarios@guardar')->name('guardarUsuario');
        Route::get('/informacion-usuario/{id}', 'Usuarios@informacionUsuario')->name('informacionUsuario');   
        Route::get('/editar-usuario/{id}', 'Usuarios@editarUsuario')->name('editarUsuario');
        Route::post('/actualizar-usuario', 'Usuarios@actualizar')->name('actualizarUsuario');
        Route::get('/eliminar-usuario/{id}', 'Usuarios@eliminar')->name('eliminarUsuario');
    });
    

    // A:deivid
    // maestrias
    Route::namespace('Maestrias')->group(function () {
        // A: Fabian Lopez
        //D:En estas rutas se encuentra todo lo relacionado a maestrias
        Route::get('/mestrias', 'Maestrias@index')->name('maestrias');
        Route::get('/nueva-mestria', 'Maestrias@nuevo')->name('nuevaMaestria');
        Route::post('/guardar-mestria', 'Maestrias@guardarMaestria')->name('guardarMaestria');
        Route::get('/editar-mestria/{id}', 'Maestrias@editarMaestria')->name('editarMaestria');
        Route::post('/actualizar-mestria', 'Maestrias@actualizarMaestria')->name('actualizarMaestria');
        Route::get('/informacion-mestria/{id}', 'Maestrias@informacionMaestria')->name('informacionMaestria');   
        Route::get('/eliminar-mestria/{id}', 'Maestrias@eliminarMaestria')->name('eliminarMaestria');   

        // A: Fabian Lopez
        //D:En estas rutas se encuentra todo lo relacionado con cortes
        Route::get('/cortes-mestria/{id}', 'Cortes@index')->name('cortesMaestria');
        Route::post('/nuevo-corte', 'Cortes@guardarCortes')->name('guardarCortes');
        Route::get('/eliminar-corte/{id}', 'Cortes@eliminarCorte')->name('eliminarCorte');   
        Route::post('/cabiar-estado-corte', 'Cortes@cambiarEstadoCorte')->name('cambiarEstadoCorte');
        Route::get('/inscritos-corte/{id}', 'Cortes@inscritosCorte')->name('inscritosCorteMaestria'); 
        Route::get('/informacion-inscritos-corte/{id}', 'Cortes@informacionInscritoCorte')->name('informacionInscritoCorteMaestria'); 
    
        
        
        // A: Fabian Lopez
        //D:En estas rutas se encuentra todo lo relacionado con maestria materias
        Route::get('/materias-maestria/{id}', 'Materias@index')->name('materiaMaestria');
        Route::get('/nueva-materias-mestria/{id}', 'Materias@nuevaMateria')->name('nuevaMateriaMaestria');
        Route::post('/guardar-materias-mestria', 'Materias@guardarMateria')->name('guardarMateriaMaestria');
        Route::get('/editar-materias-mestria/{id}', 'Materias@editarMateriaMaestria')->name('editarmateriaMaestria');
        Route::post('/actualizar-materias-mestria', 'Materias@actualizarMateriaMaestria')->name('actualizarMateriaMaestrias');
        Route::get('/eliminar-materias-mestria/{id}', 'Materias@eliminarMateriaMaestria')->name('eliminarMateriaMaestria'); 


        // A:deivid
        // D:asignar coordinadores a maestrias
        Route::get('/asignar-coordinares/{maestria}', 'Coordinadores@index')->name('asignarCoordinadores');
        Route::post('/sincronizar-coordinares', 'Coordinadores@sincronizar')->name('sincronizarCoordinadores');
        
    });



    // A:deivid
    // incripciones
    Route::namespace('Inscripciones')->group(function () {

        Route::get('/mis-inscripciones', 'Inscripciones@misInscripciones')->name('misInscripciones');
        Route::get('/subir-comprobante-pago/{inscripcion}', 'Inscripciones@subirComprobantePago')->name('subirComprobantePago');
        Route::post('/guardar-comprobante-pago', 'Inscripciones@guardarComprobantePago')->name('guardarComprobantePago');
        Route::get('/ver-mi-inscripcion/{id}', 'Inscripciones@verMiInscripcion')->name('verMiInscripcion');
        Route::get('/ver-mi-inscripcion-pdf/{id}', 'Inscripciones@inscripcionPdf')->name('inscripcionPdf');
    });
    


    //A:Deivid
    //D. roles y permisos de sistema solo acesso Administrador
    Route::namespace('Sistema')->group(function () {
        // roles
        Route::get('/roles', 'Roles@index')->name('roles');
        Route::post('/roles-guardar', 'Roles@guardar')->name('guardarRol');
        Route::get('/roles-eliminar/{id}', 'Roles@eliminar')->name('eliminarRol');
        // permisos
        Route::get('/permisos/{idRol}', 'Permisos@index')->name('permisos');
        Route::post('/permisos-sincronizar', 'Permisos@sincronizar')->name('sincronizarPermiso');
    });
    
   

    
    
});
