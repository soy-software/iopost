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