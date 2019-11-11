<?php

Breadcrumbs::for('inicio', function ($trail) {
    $trail->push('Inicio', url('/'));
});
// authenticacion
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Acceder a sistema', route('login'));
});
Breadcrumbs::for('restablecerContrasena', function ($trail) {
    $trail->parent('login');
    $trail->push('Restablecer contraseña', url('/password/reset'));
});
Breadcrumbs::for('confirmarCorreo', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Confirma tu correo electrónico', url('/email/verify'));
});
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Administración', route('home'));
});

// inscripcion

Breadcrumbs::for('incripcion', function ($trail,$corte) {
    $trail->parent('inicio');
    $trail->push('Inscripción en línea', route('incripcion',$corte->id));
});
Breadcrumbs::for('misInscripciones', function ($trail) {
    $trail->parent('home');
    $trail->push('Mis inscripciones', route('misInscripciones'));
});
Breadcrumbs::for('subirComprobantePago', function ($trail,$inscripcion) {
    $trail->parent('misInscripciones');
    $trail->push('Subir comprobante de pago', route('subirComprobantePago',$inscripcion->id));
});
Breadcrumbs::for('verMiInscripcion', function ($trail,$inscripcion) {
    $trail->parent('misInscripciones');
    $trail->push('Ver mi inscripción', route('verMiInscripcion',$inscripcion->id));
});

// usuarios
Breadcrumbs::for('usuarios', function ($trail) {
    $trail->parent('home');
    $trail->push('Listado de usuarios', route('usuarios'));
});
Breadcrumbs::for('nuevoUsuario', function ($trail) {
    $trail->parent('usuarios');
    $trail->push('Ingreso de nuevo usuario', route('nuevoUsuario'));
});
Breadcrumbs::for('editarUsuario', function ($trail,$usuario) {
    $trail->parent('usuarios');
    $trail->push('Editar usuario', route('editarUsuario',$usuario->id));
});
Breadcrumbs::for('informacionUsuario', function ($trail,$usuario) {
    $trail->parent('usuarios');
    $trail->push('Información usuario', route('informacionUsuario',$usuario->id));
});


//maestrias
Breadcrumbs::for('maestrias', function ($trail) {
    $trail->parent('home');
    $trail->push('Listado de Mestrias', route('maestrias'));
});

Breadcrumbs::for('nuevaMaestria', function ($trail) {
    $trail->parent('maestrias');
    $trail->push('Nueva Mestría', route('nuevaMaestria'));
});
Breadcrumbs::for('editarMaestria', function ($trail,$maestria) {
    $trail->parent('maestrias');
    $trail->push('Editar '. $maestria->nombre, route('editarMaestria',$maestria->id));
});

Breadcrumbs::for('informacionMaestria', function ($trail,$maestria) {
    $trail->parent('maestrias');
    $trail->push('Información  '. $maestria->nombre, route('informacionMaestria',$maestria->id));
});

//A:fabian 
//d:Breadcrums de materias maestria
Breadcrumbs::for('listadoMateriaMaestria', function ($trail,$maestria) {
    $trail->parent('maestrias');
    $trail->push('Materia de   '. $maestria->nombre, route('materiaMaestria',$maestria->id));
});
Breadcrumbs::for('nuevaMateriaMaestria', function ($trail,$maestria) {
    $trail->parent('listadoMateriaMaestria',$maestria);
    $trail->push('Nueva Materia '. $maestria->nombre, route('materiaMaestria',$maestria->id));
});
Breadcrumbs::for('editarMateriaMaestria', function ($trail,$materiaMaestria) {
    $trail->parent('listadoMateriaMaestria',$materiaMaestria->maestria);
    $trail->push('Editar materia', route('materiaMaestria',$materiaMaestria->id));
});
//A:fabian 
//d:Breadcrums de cortes
Breadcrumbs::for('cortesMaestria', function ($trail,$maestria) {
    $trail->parent('maestrias');
    $trail->push('Cortes de '.$maestria->nombre, route('cortesMaestria',$maestria->id));
});

Breadcrumbs::for('InscritoCortesMaestria', function ($trail,$corte) {
    $trail->parent('cortesMaestria',$corte->maestria);
    $trail->push('Inscritos del corte '.$corte->numero, route('inscritosCorteMaestria',$corte->id));
});

Breadcrumbs::for('InformacionInscritoCortesMaestria', function ($trail,$inscripcion) {
    $trail->parent('InscritoCortesMaestria',$inscripcion->corte);
    $trail->push('Información de '.$inscripcion->user->apellidos, route('informacionInscritoCorteMaestria',$inscripcion->id));
});

//A:Deivid
//D:Breadcrums de roles y permisos
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('home');
    $trail->push('Roles', route('roles'));
});
Breadcrumbs::for('permisos', function ($trail,$rol) {
    $trail->parent('roles');
    $trail->push('Permisos', route('permisos',$rol->id));
});


