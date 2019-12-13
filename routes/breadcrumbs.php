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

// mi perfil

Breadcrumbs::for('miPerfil', function ($trail) {
    $trail->parent('home');
    $trail->push('Mi perfil', route('miPerfil'));
});
Breadcrumbs::for('actualizarMiRegistroAcademico', function ($trail,$ra) {
    $trail->parent('miPerfil');
    $trail->push('Actualizar mi registro académico', route('actualizarMiRegistroAcademico',$ra->id));
});

// inscripcion

Breadcrumbs::for('incripcion', function ($trail,$corte) {
    $trail->parent('inicio');
    $trail->push('Registro en línea', route('incripcion',$corte->id));
});
Breadcrumbs::for('misInscripciones', function ($trail) {
    $trail->parent('home');
    $trail->push('Mis inscripciones', route('misInscripciones'));
});
Breadcrumbs::for('subirComprobantePago', function ($trail,$inscripcion) {
    $trail->parent('misInscripciones');
    $trail->push('Subir comprobante de pago', route('subirComprobantePago',$inscripcion->id));
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
    $trail->push('Listado de maestrías', route('maestrias'));
});

Breadcrumbs::for('nuevaMaestria', function ($trail) {
    $trail->parent('maestrias');
    $trail->push('Nueva maestría', route('nuevaMaestria'));
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
    $trail->push('Nueva materia '. $maestria->nombre, route('materiaMaestria',$maestria->id));
});
Breadcrumbs::for('editarMateriaMaestria', function ($trail,$materiaMaestria) {
    $trail->parent('listadoMateriaMaestria',$materiaMaestria->maestria);
    $trail->push('Editar materia', route('materiaMaestria',$materiaMaestria->id));
});
//A:fabian 
//d:Breadcrums de cortes
Breadcrumbs::for('cortesMaestria', function ($trail,$maestria) {
    $trail->parent('maestrias');
    $trail->push('Cohorte de '.$maestria->nombre, route('cortesMaestria',$maestria->id));
});
Breadcrumbs::for('nuevoCohorte', function ($trail,$maestria) {
    $trail->parent('cortesMaestria',$maestria);
    $trail->push('Nueva cohorte', route('nuevoCohorte',$maestria->id));
});

Breadcrumbs::for('editarCorte', function ($trail,$corte) {
    $trail->parent('cortesMaestria',$corte->maestria);
    $trail->push('Editar cohorte', route('editarCorte',$corte->id));
});


Breadcrumbs::for('InscritoCortesMaestria', function ($trail,$corte) {
    $trail->parent('cortesMaestria',$corte->maestria);
    $trail->push('Registros del cohorte '.$corte->numero, route('inscritosCorteMaestria',$corte->id));
});

Breadcrumbs::for('InformacionInscritoCortesMaestria', function ($trail,$inscripcion) {
    $trail->parent('InscritoCortesMaestria',$inscripcion->corte);
    $trail->push('Información de '.$inscripcion->user->apellidos, route('informacionInscritoCorteMaestria',$inscripcion->id));
});


// A:deivid
// D:asigmacion de coordinadores
Breadcrumbs::for('asignarCoordinadores', function ($trail,$maestria) {
    $trail->parent('maestrias');
    $trail->push('Asignación de coordinadores', route('asignarCoordinadores',$maestria->id));
});


// A:deivid
// D:Mis maestrías asignadas a usuario coordinador
Breadcrumbs::for('misMaestrias', function ($trail) {
    $trail->parent('home');
    $trail->push('Mis maestrías asignados', route('misMaestrias'));
});
Breadcrumbs::for('cortesEnMisMaestrias', function ($trail,$maestria) {
    $trail->parent('misMaestrias');
    $trail->push('Cortes en '.$maestria->nombre, route('cortesEnMisMaestrias',$maestria->id));
});
Breadcrumbs::for('inscritosEnCorteMiMaestrias', function ($trail,$corte) {
    $trail->parent('misMaestrias');
    $trail->push('Inscripciones en corte '.$corte->numero, route('inscritosEnCorteMiMaestrias',$corte->id));
});
Breadcrumbs::for('informacionAspirante', function ($trail,$inscripcion) {
    $trail->parent('inscritosEnCorteMiMaestrias',$inscripcion->corte);
    $trail->push('Información de inscripción', route('informacionAspirante',$inscripcion->id));
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


