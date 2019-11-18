@extends('layouts.app',['title'=>'Asignar coordinares'])
@section('breadcrumbs', Breadcrumbs::render('asignarCoordinadores',$maestria))
@section('content')

<form action="{{ route('sincronizarCoordinadores') }}" method="POST">
    @csrf
    <input type="hidden" name="maestria" value="{{ $maestria->id }}">
    <div class="card">
        <div class="card-header">
            Listado de coordinadores
        </div>
        <div class="card-body">
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Identificación</th>
                        <th scope="col">Email</th>
                        <th scope="col">Asignar</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @if (count($coordinadoresSi)>0)
                    @foreach ($coordinadoresSi as $coorSi)
                        <tr>       
                            <td>
                                {{ $coorSi->nombres }}
                            </td>
                            <td>
                                {{ $coorSi->apellidos }}
                            </td>
                            <td>
                                {{ $coorSi->identificacion }}
                            </td>
                            <td>
                                {{ $coorSi->email }}
                            </td>
                            <td class="text-center">
                                <div class="form-check">
                                    <input class="form-check-input" name="coordinador[{{ $coorSi->id }}]" {{ old('coordinador.'.$coorSi->id)==$coorSi->id ?'checked':'' }} type="checkbox" value="{{ $coorSi->id }}" id="{{ $coorSi->id }}" checked >
                                </div>
                            </td>
                        </tr>  
                    @endforeach
                    @else
                    <div class="alert alert-dark" role="alert">
                        <strong>No existe coordinadores asignados</strong>
                    </div>
                    @endif
                    
                    
                    @if (count($coordinadoresNo)>0)
                        @foreach ($coordinadoresNo as $coorNo)
                            <tr>
                            
                                <td>
                                    {{ $coorNo->nombres }}
                                </td>
                                <td>
                                    {{ $coorNo->apellidos }}
                                </td>
                                <td>
                                    {{ $coorNo->identificacion }}
                                </td>
                                <td>
                                    {{ $coorNo->email }}
                                </td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" name="coordinador[{{ $coorNo->id }}]" {{ old('coordinador.'.$coorNo->id)==$coorNo->id ?'checked':'' }} type="checkbox" value="{{ $coorNo->id }}" id="{{ $coorNo->id }}">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <div class="alert alert-dark" role="alert">
                        <strong>No existe coordinadores para asignar</strong>
                    </div>
                    @endif
                    
                    
                </tbody>
                </table>
            
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">
                Asignar coordinador
            </button>
        </div>
    </div>
</form>

@prepend('linksPie')
    <script>
    $('#menuMaestria').addClass('active');  
    </script>
@endprepend

@endsection
