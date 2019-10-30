<?php

namespace App\Http\Controllers\Usuarios;

use App\DataTables\Usuarios\UsuariosDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Usuarios extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Administrador|Usuarios']);
    }
    public function index(UsuariosDataTable $dataTable)
    {
        return $dataTable->render('usuarios.usuarios.index');
    }
}
