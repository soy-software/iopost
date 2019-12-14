@extends('layouts.app',['title'=>'Inscripciones en corte'])
@section('breadcrumbs', Breadcrumbs::render('inscritosEnCorteMiMaestrias',$corte))

@section('barraLateral')
@if (count($inscripciones)>0)
    <div class="breadcrumb justify-content-center">
        
        <div class="breadcrumb-elements-item dropdown p-0">
            <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-file-excel"></i>
                Descargar EXCEL
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('descargarExcelInscritos',['corte'=>$corte->id,'opcion'=>'Todos']) }}" class="dropdown-item">
                    <i class="fas fa-file-excel"></i> Todos    
                </a>    
                <a href="{{ route('descargarExcelInscritos',['corte'=>$corte->id,'opcion'=>'Registro']) }}" class="dropdown-item">
                    <i class="fas fa-file-excel"></i> Solo registrados    
                </a>    
                <a href="{{ route('descargarExcelInscritos',['corte'=>$corte->id,'opcion'=>'Subir comprobante de registro']) }}" class="dropdown-item">
                    <i class="fas fa-file-excel"></i> Solo quienes tienen comprobante de registro    
                </a>
                <a href="{{ route('descargarExcelInscritos',['corte'=>$corte->id,'opcion'=>'Aprobado']) }}" class="dropdown-item">
                    <i class="fas fa-file-excel"></i> Solo aprobados el registro    
                </a> 
                <a href="{{ route('descargarExcelInscritos',['corte'=>$corte->id,'opcion'=>'Inscrito']) }}" class="dropdown-item">
                    <i class="fas fa-file-excel"></i> Solo inscritos  
                </a> 
            </div>
        </div>
    </div>
@endif

@endsection


@section('content')

<div class="card">
    
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
    $('#menuMisMaestria').addClass('active');  
    </script>
    {!! $dataTable->scripts() !!}
@endprepend

@endsection
