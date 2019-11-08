@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Mis Inscripciones
    </div>
    <div class="card-body">
        @if (count($inscripciones)>0)
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Maestría</th>
                        <th scope="col">Fecha de inscripción</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($inscripciones as $inscripcion)
                        
                            <tr>
                                <th scope="row">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a href="" class="btn btn-dark"  data-toggle="tooltip" data-placement="top" title="">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        
                                        <button type="button" onclick="eliminar(this);" data-url=""  class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-title="">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        
                                    </div>
                                </th>
                                <td>
                                    {{ $inscripcion->nombre }}
                                </td>
                                <td>
                                    {{ $inscripcion->inscripcion->created_at }}
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
        <div class="alert alert-dark" role="alert">
            <strong>No tiene ninguna isncripciones</strong>
        </div>
        @endif
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuMisInscripciones').addClass('active');  
    </script>
@endprepend

@endsection
