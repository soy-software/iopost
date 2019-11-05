@extends('layouts.app',['title'=>'Roles'])

@section('breadcrumbs', Breadcrumbs::render('roles'))



@section('content')
<form action="{{ route('guardarRol') }}" method="post">
    @csrf
    <div class="input-group mb-1">
        <input type="text" name="rol" value="{{ old('rol') }}" class="form-control" placeholder="Ingrese nuevo rol.." aria-label="Ingrese nuevo rol.." aria-describedby="basic-addon2" required>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Guardar <i class="icon-paperplane ml-2"></i></button>
        </div>
    </div>
</form>

<div class="card card-body">
    <div class="table-responsive">
        {!! $dataTable->table()  !!}
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
        $('#menuRoles').addClass('active');
    </script>
    {!! $dataTable->scripts() !!}
    
@endprepend

@endsection
