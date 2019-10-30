@extends('layouts.app',['title'=>'Listado de usuarios'])

@section('breadcrumbs', Breadcrumbs::render('usuarios'))
@section('barraLateral')

    <div class="breadcrumb justify-content-center">
        <a href="{{ route('nuevoUsuario') }}" class="breadcrumb-elements-item">
            <i class="fas fa-plus"></i>
            Nuevo usuario.
        </a>
        <div class="breadcrumb-elements-item dropdown p-0">
            <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-users"></i>
                Ver usuarios por roles
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('usuarios') }}" class="dropdown-item"><i class="fas fa-user-lock"></i>Ver todos</a>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        Listado de usuarios
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {!! $dataTable->table()  !!}
        </div>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

@push('linksCabeza')
{{--  datatable  --}}
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables/datatables.min.css') }}"/>
<script type="text/javascript" src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>

@endpush

@prepend('linksPie')
    <script>
    $('#menuUsuarios').addClass('active');  

    {{-- $.confirm({
        title: 'Confirme!',
        content: 'Simple confirmación!',
        theme: 'modern',
        type:'dark',
        icon:'far fa-sad-cry',
        closeIcon:true,
        buttons: {
            confirmar: function () {
                $.alert('Confirmed!');
            }
        }
    }); --}}
    
    
    </script>
    {!! $dataTable->scripts() !!}
    
@endprepend
@endsection
