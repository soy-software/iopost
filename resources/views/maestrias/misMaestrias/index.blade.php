@extends('layouts.app',['title'=>'Mis maestrías'])
@section('breadcrumbs', Breadcrumbs::render('misMaestrias'))
@section('content')

@if (count($cortes)>0)
    <div class="card">
        <div class="card-header">
            Mis maestrías asignados
        </div>
        <div class="card-body">
            
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Maestría</th>
                <th scope="col">Título</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cortes as $corte)
                    <tr>
                        <th scope="row">
                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                <a href="{{ route('inscritosEnCorteMiMaestrias',$corte->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="POSTULANTES">
                                    <i class="icon-reading"></i>
                                </a>
                            </div>
                        </th>
                        <td>
                            {{ $corte->maestria->nombre }} <small>Cohorte {{ $corte->numero }}</small>
                        </td>
                        <td>
                            {{ $corte->maestria->titulo }}
                        </td>
                    </tr>      
                @endforeach
              
            </tbody>
        </table>

        </div>
        <div class="card-footer text-muted">
            {{ $cortes->links() }}
        </div>
    </div>
@else
    <div class="alert alert-dark" role="alert">
        <strong>No tiene ninguna maestría asignada</strong>
    </div>
@endif


@prepend('linksPie')
    <script>
    $('#menuMisMaestria').addClass('active');  
    </script>
@endprepend

@endsection
