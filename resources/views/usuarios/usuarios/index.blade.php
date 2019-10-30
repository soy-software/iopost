@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Listado de usuarios
    </div>
    <div class="card-body">
        <div class="table-reponsive">
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

@endpush

@prepend('linksPie')
    <script>
    $('#menuUsuarios').addClass('active');    
    </script>
    {!! $dataTable->scripts() !!}
    
@endprepend
@endsection
