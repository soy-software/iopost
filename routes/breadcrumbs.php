<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Administración', route('home'));
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
Breadcrumbs::for('mestrias', function ($trail) {
    $trail->parent('home');
    $trail->push('Listado de Mestrias', route('maestrias'));
});

Breadcrumbs::for('nuevaMaestria', function ($trail) {
    $trail->parent('mestrias');
    $trail->push('Nueva Mestría', route('nuevaMaestria'));
});
Breadcrumbs::for('editarMaestria', function ($trail,$maestria) {
    $trail->parent('mestrias');
    $trail->push('Editar '. $maestria->nombre, route('editarMaestria',$maestria->id));
});

Breadcrumbs::for('informacionMaestria', function ($trail,$maestria) {
    $trail->parent('mestrias');
    $trail->push('Información  '. $maestria->nombre, route('informacionMaestria',$maestria->id));
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