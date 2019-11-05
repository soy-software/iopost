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

Auth::routes(['register' => false,'verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['verified', 'auth'])->group(function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    // A:Deivid
    // D:Gestion de usuarios
    Route::namespace('Usuarios')->group(function () {
        Route::get('/usuarios', 'Usuarios@index')->name('usuarios');
        Route::get('/nuevo-usuario', 'Usuarios@nuevo')->name('nuevoUsuario');
        Route::post('/obtener-cantones-x-provincia', 'Usuarios@obtenerCantonesXprovincia')->name('obtenerCantonesXprovincia');
        Route::post('/obtener-parroquias-x-canton', 'Usuarios@obtenerParroquiasXcanton')->name('obtenerParroquiasXcanton');
        Route::post('/guardar-usuario', 'Usuarios@guardar')->name('guardarUsuario');
        Route::get('/informacion-usuario/{id}', 'Usuarios@informacionUsuario')->name('informacionUsuario');   
        Route::get('/editar-usuario/{id}', 'Usuarios@editarUsuario')->name('editarUsuario');
        Route::post('/actualizar-usuario', 'Usuarios@actualizar')->name('actualizarUsuario');
        
        
    });
    // A: Fabian Lopez
    //D:En estas rutas se encuentra todo lo relacionado a maestrias
    Route::get('/mestrias', 'Maestrias@index')->name('maestrias');
    Route::get('/nueva-mestria', 'Maestrias@nuevo')->name('nuevaMaestria');
    Route::post('/guardar-mestria', 'Maestrias@guardarMaestria')->name('guardarMaestria');
    Route::get('/editar-mestria/{id}', 'Maestrias@editarMaestria')->name('editarMaestria');
    Route::post('/actualizar-mestria', 'Maestrias@actualizarMaestria')->name('actualizarMaestria');
    Route::get('/informacion-mestria/{id}', 'Maestrias@informacionMaestria')->name('informacionMaestria');   
    
});
