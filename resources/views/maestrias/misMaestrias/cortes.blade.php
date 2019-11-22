@extends('layouts.app',['title'=>'Cortes en maestría'])
@section('breadcrumbs', Breadcrumbs::render('cortesEnMisMaestrias',$maestria))
@section('content')

@if (count($cortes)>0)
    <div class="card">
        <div class="card-header">
            Cortes en {{ $maestria->nombre }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Acciones</th>
                        <th scope="col">Corte</th>
                        <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cortes as $corte)
                            <tr>
                                <th scope="row">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                        <a href="{{ route('inscritosEnCorteMiMaestrias',$corte->id) }}" class="btn btn-primary">
                                            <i class="fa fa-users"></i> Inscritos
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    Corte {{ $corte->numero }}
                                </td>
                                <td>
                                    {{ $corte->estado }}
                                </td>
                            </tr>      
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted">
            {{ $cortes->links() }}
        </div>
    </div>
@else
    <div class="alert alert-dark" role="alert">
        <strong>Está maestria no tiene cortes</strong>
    </div>
@endif


@prepend('linksPie')
    <script>
    $('#menuMisMaestria').addClass('active');  
    </script>
@endprepend

@endsection
