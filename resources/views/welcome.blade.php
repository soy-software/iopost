@extends('layouts.app',['title'=>'Bienvenido'])
@section('breadcrumbs', Breadcrumbs::render('inicio'))
@section('content')
@if (count($cortes)>0)
  <div class="card">
    <div class="card-header text-center">
      <strong>UNIVERSIDAD TÉCNICA DE COTOPAXI - POSGRADOS</strong>
      <h1><span class="badge badge-primary">Registros disponibles</span></h1>
    </div>
    <div class="card-body">
      
    
        <div class="row">  
          @foreach ($cortes as $corte)
          
            <div class="col-md-12">

              <div class="card border border-primary">
                  <div class="card-header bg-primary text-center">
                      <strong>{{ $corte->maestria->nombre }}</strong>
                  </div>
                <div class="row">
                  <div class="col-4">
                      
                      <div class="mt-1 mr-1 ml-1 mb-1">
                          <a href="{{ route('incripcion',$corte->id) }}">
                            @if (Storage::exists($corte->maestria->foto))
                                <img class="card-img-top img-fluid" src="{{ Storage::url($corte->maestria->foto) }}" alt="" height="50px">
                            @else
                              <img class="card-img-top img-fluid" src="{{ asset('img/maestria.jpg') }}" alt="">
                            @endif
                          </a>
                      </div>
                  </div>
                  <div class="col-8">
                      <div class="table-responsive mt-2 mr-2">
                          <table class="table table-bordered table-striped table-sm">
                            <thead>
                              <tr class="text-center">
                                <th scope="col" colspan="2">PROCESO DE ADMISIÓN</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Presentación de documentos:</th>
                                <td>
                                  {{ $corte->fechaInicioDocumentos }} al {{ $corte->fechaFinDocumentos }}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Examen de admisión:</th>
                                <td>
                                  {{ $corte->fechaAdmision }}, Hora: {{ $corte->horaAdmision }}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Entrevista y ensayo:</th>
                                <td>
                                  {{ $corte->entrevistaEnsayo }}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Presentación de informes:</th>
                                <td>
                                  {{ $corte->presentacionInformes }}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Resolución proceso de admisión:</th>
                                <td>
                                  {{ $corte->resolucionProcesoAdmitidos }}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Publicación de admitidos:</th>
                                <td>
                                  {{ $corte->publicacionAdmitidos }}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Período matrícula:</th>
                                <td>
                                  {{ $corte->fechaInicioMatricula }} al {{ $corte->fechaFinMatricula }}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Inicio de clases:</th>
                                <td>
                                  {{ $corte->inicioClases }}
                                </td>
                              </tr>
                              
                            </tbody>
                          </table>
                      </div>
                      
                      
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('incripcion',$corte->id) }}" class="btn btn-primary btn-lg">
                        REGISTRATE AQUÍ
                      <i class="fas fa-sign-in-alt"></i>
                    </a>
                  </div>
              </div>

            </div>
          
          @endforeach
        </div>

    </div>
  </div>
@else
    <div class="alert alert-dark" role="alert">
      <strong>No tenemos promociones de maestrias por el momento.!</strong>
    </div>

@endif
@endsection
