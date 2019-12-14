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
Route::get('/registro-en-linea/{corte}', 'Estaticas@inscripcion')->name('incripcion');
Route::post('/registro-procesar', 'Estaticas@procesarInscripcion')->name('procesarInscripcion');
Route::get('/descargar-mi-registro-maestria/{inscripcion}', 'Estaticas@descargarRegistroPdf')->name('descargarRegistroPdf');
Route::get('/ver-mi-registro-maestria/{inscripcion}', 'Estaticas@verRegistroPdf')->name('verRegistroPdf');


// A:Deivid
// D:inscripcion en linea



Auth::routes(['register' => false,'verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// perfil de suario
Route::get('/mi-perfil', 'HomeController@miPerfil')->name('miPerfil');
Route::post('/mi-perfil-actualizar-datos', 'HomeController@miPerfilActualizarDatos')->name('miPerfilActualizarDatos');
Route::post('/mi-perfil-actualizar-laboral', 'HomeController@actualizarInformacionLaboral')->name('miPerfilActualizarLaboral');
Route::post('/mi-perfil-guardar-academico', 'HomeController@actualizarRegistroAcademico')->name('miPerfilActualizarAcademico');
Route::get('/mi-perfil-eliminar-academico/{registroAcademico}', 'HomeController@eliminarMiRegistroAcademico')->name('eliminarMiRegistroAcademico');
Route::get('/mi-perfil-editar-academico/{registroAcademico}', 'HomeController@editarMiRegistroAcademico')->name('editarMiRegistroAcademico');
Route::post('/mi-perfil-actualizar-academico', 'HomeController@actualizarMiRegistroAcademico')->name('actualizarMiRegistroAcademico');



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
        Route::post('/actualizar-informacion-laboral-usuario', 'Usuarios@actualizarInformacionLaboral')->name('actualizarInformacionLaboral');
        Route::post('/actualizar-registro-academico-usuario', 'Usuarios@actualizarRegistroAcademico')->name('actualizarRegistroAcademico');
        
        Route::get('/eliminar-usuario/{id}', 'Usuarios@eliminar')->name('eliminarUsuario');
    });
    

    // A:deivid
    // maestrias
    Route::namespace('Maestrias')->group(function () {
        // A: Fabian Lopez
        //D:En estas rutas se encuentra todo lo relacionado a maestrias
        Route::get('/maestrias', 'Maestrias@index')->name('maestrias');
        Route::get('/nueva-mestria', 'Maestrias@nuevo')->name('nuevaMaestria');
        Route::post('/guardar-mestria', 'Maestrias@guardar')->name('guardarMaestria');
        Route::get('/editar-mestria/{id}', 'Maestrias@editar')->name('editarMaestria');
        Route::post('/actualizar-mestria', 'Maestrias@actualizar')->name('actualizarMaestria');
        Route::get('/informacion-mestria/{id}', 'Maestrias@informacion')->name('informacionMaestria');   
        Route::get('/eliminar-mestria/{id}', 'Maestrias@eliminar')->name('eliminarMaestria');   

        // A: Fabian Lopez
        //D:En estas rutas se encuentra todo lo relacionado con cortes
        Route::get('/cohortes-de-maestria/{maestria}', 'Cortes@index')->name('cortesMaestria');
        Route::get('/nuevo-cohorte/{maestria}', 'Cortes@nuevo')->name('nuevoCohorte');
        Route::post('/guardar-cohorte', 'Cortes@guardar')->name('guardarCorte');
        Route::get('/editar-cohorte/{corte}', 'Cortes@editar')->name('editarCorte');
        Route::post('/actualizar-cohorte', 'Cortes@actualizar')->name('actualizarCorte');
        Route::get('/eliminar-cohorte/{id}', 'Cortes@eliminarCorte')->name('eliminarCorte');   
        Route::post('/cambiar-estado-cohorte', 'Cortes@cambiarEstadoCorte')->name('cambiarEstadoCorte');
        Route::get('/registros-cohorte/{id}', 'Cortes@inscritosCorte')->name('inscritosCorteMaestria'); 
        Route::get('/informacion-registro-cohorte/{id}', 'Cortes@informacionInscritoCorte')->name('informacionInscritoCorteMaestria'); 
        Route::post('/cambiar-estado-de-inscripcion', 'Cortes@cambiarEstadoInscripcion')->name('cambiarEstadoInscripcion');
    
        
        
        // A: Fabian Lopez
        //D:En estas rutas se encuentra todo lo relacionado con maestria materias
        Route::get('/materias-maestria/{id}', 'Materias@index')->name('materiaMaestria');
        Route::get('/nueva-materias-mestria/{id}', 'Materias@nuevaMateria')->name('nuevaMateriaMaestria');
        Route::post('/guardar-materias-mestria', 'Materias@guardarMateria')->name('guardarMateriaMaestria');
        Route::get('/editar-materias-mestria/{id}', 'Materias@editarMateriaMaestria')->name('editarmateriaMaestria');
        Route::post('/actualizar-materias-mestria', 'Materias@actualizarMateriaMaestria')->name('actualizarMateriaMaestrias');
        Route::get('/eliminar-materias-mestria/{id}', 'Materias@eliminarMateriaMaestria')->name('eliminarMateriaMaestria'); 


     



        // A:deivid
        // D: maestrias asignados a un usuario coordinador
        Route::get('/mis-maestrias', 'MisMaestrias@index')->name('misMaestrias');
        Route::get('/inscritos-en-corte/{corte}', 'MisMaestrias@inscritos')->name('inscritosEnCorteMiMaestrias');
        Route::get('/descragar-excel-inscritos/{corte}/{opcion}', 'MisMaestrias@descargarExcelinscritos')->name('descargarExcelInscritos');
        Route::get('/informacion-de-aspirante/{inscripcion}', 'MisMaestrias@informacionAspirante')->name('informacionAspirante');
        
        
        
    });



    // A:deivid
    // incripciones
    Route::namespace('Inscripciones')->group(function () {

        Route::get('/mis-inscripciones', 'Inscripciones@misInscripciones')->name('misInscripciones');
        Route::get('/subir-comprobante-de-registro/{inscripcion}', 'Inscripciones@subirComprobantePago')->name('subirComprobantePago');
        Route::post('/guardar-comprobante-pago', 'Inscripciones@guardarComprobantePago')->name('guardarComprobantePago');
        Route::get('/ver-mi-inscripcion-pdf/{id}', 'Inscripciones@inscripcionPdf')->name('inscripcionPdf');
        
        Route::get('/aprobar-registro-maestrias', 'Registros@index')->name('aprobarRegistroMaestrias');
        Route::post('/aprobar-registro-maestrias-factura', 'Registros@aprobarRegistroFactura')->name('aprobarRegistroFactura');
        Route::get('/reporte-registros-de-pagos', 'Registros@reportesDePago')->name('registroReportePagos');
        Route::post('/obtener-cohortes-x-maestrias', 'Registros@obtenerCohortesMaestria')->name('obtenerCohortesMaestria');
        Route::post('/obtener-registros-de-pago-x-cohorte', 'Registros@obtenerRegistroPorCohorte')->name('obtenerRegistroPorCohorte');
        
    });
    

    // A:deivid
    // D:cuestionario de pregunatas de cada cohore
    Route::namespace('Admisiones')->group(function () {
        Route::get('/cuestionario/{cohorte}', 'Cuestionarios@index')->name('cuestionario');
        Route::post('/guardar-pregunta-cuestionario', 'Cuestionarios@guardarPreguntaCuestionario')->name('guardarPreguntaCuestionario');
        Route::get('/eliminar-pregunta-cuestionario/{cuestionario}', 'Cuestionarios@eliminarCuestionario')->name('eliminarCuestionario');
        
        

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
