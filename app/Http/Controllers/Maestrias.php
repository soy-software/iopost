<?php

namespace App\Http\Controllers;

use App\DataTables\MaestriasDataTable;
use App\Models\Maestria;
use Illuminate\Http\Request;


class Maestrias extends Controller
{
    public function index(MaestriasDataTable $dataTable)
    {
        return  $dataTable->render('maestrias.index') ;
    }

    public function nuevo()
    {
        return view('maestrias.nuevo');
    }
}
