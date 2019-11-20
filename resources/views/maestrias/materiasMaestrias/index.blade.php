@extends('layouts.app',['title'=>'Listado de materias'])

@section('breadcrumbs', Breadcrumbs::render('listadoMateriaMaestria',$maestria))
@section('barraLateral')

    <div class="breadcrumb justify-content-center">
        <a href="{{ route('nuevaMateriaMaestria',$maestria->id) }}" class="breadcrumb-elements-item">
            <i class="fas fa-plus"></i>
            Nueva Materia.
        </a>
        
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">Administración de Materias</div>
    <div class="card-body">
        <div class="table-responsive">
            {!! $dataTable->table()  !!}
        </div>
    </div>
</div>
@push('linksCabeza')
{{--  datatable  --}}
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables/datatables.min.css') }}"/>
<script type="text/javascript" src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

@endpush

@prepend('linksPie')
    <script>
    $('#menuMaestria').addClass('active');    
    </script>
    {!! $dataTable->scripts() !!}
    
@endprepend
@endsection