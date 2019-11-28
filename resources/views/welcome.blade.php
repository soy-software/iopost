@extends('layouts.app',['title'=>'Bienvenido'])
@section('breadcrumbs', Breadcrumbs::render('inicio'))
@section('content')
@if (count($cortes)>0)

    <div class="row">
      @foreach ($cortes as $corte)

      <div class="col-md-6">

          <div class="card border-top-3 border-top-dark border-bottom-3 border-bottom-dark border-dark">
            <div class="card-header">
                <h4 class="card-title text-center mb-2">
                    Maestría en: <strong>{{ $corte->maestria->nombre }}</strong>
                </h4>
              
            </div>
              @if (Storage::exists($corte->maestria->foto))
                  <img class="card-img-top" src="{{ Storage::url($corte->maestria->foto) }}" alt="">
              @else
                <img class="card-img-top" src="{{ asset('img/maestria.jpg') }}" alt="">
              @endif
            
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                  <thead>
                    <tr class="text-center">
                      <th scope="col" colspan="2">
                        
                          <strong>
                              PROCESO DE ADMISIÓN
                          </strong>
                        
                      </th>
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
                  <tfoot>
                    <tr>
                      <td>
                        <h2>
                          <strong>
                              VALOR DE LA MAESTRÍA
                          </strong>
                        </h2>
                      </td>
                      <td>
                        <h2>
                          <strong>
                              $ {{ $corte->valorColegiatura }}
                          </strong>
                        </h2>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            
            <div class="card-footer text-muted">
                <a href="{{ route('incripcion',$corte->id) }}" class="btn btn-dark btn-lg btn-block">
                    REGISTRATE AQUÍ
                  <i class="fas fa-sign-in-alt"></i>
                </a>
            </div>
          </div>

      </div>
      
      @endforeach
    </div>

@else
    <div class="alert alert-dark" role="alert">
      <strong>No tenemos promociones de maestrias por el momento.!</strong>
    </div>

@endif
@endsection
