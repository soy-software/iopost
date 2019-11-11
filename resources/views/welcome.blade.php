@extends('layouts.app',['title'=>'Bienvenido'])
@section('breadcrumbs', Breadcrumbs::render('inicio'))
@section('content')
@if (count($cortes)>0)
  <div class="card">
    <div class="card-header text-center">
      <strong>UNIVERSIDAD TÉCNICA DE COTOPAXI - POSGRADOS</strong>
      <h1><span class="badge badge-primary">Inscripciones disponibles</span></h1>
    </div>
    <div class="card-body">
      
    
        <div class="row">  
          @foreach ($cortes as $corte)
          
            <div class="col-md-4">

              <div class="card">
                <a href="{{ route('incripcion',$corte->id) }}">
                  @if (Storage::exists($corte->maestria->foto))
                      <img class="card-img-top img-fluid" src="{{ Storage::url($corte->maestria->foto) }}" alt="">
                  @else
                    <img class="card-img-top img-fluid" src="{{ asset('img/maestria.jpg') }}" alt="">
                  @endif
                </a>

                <div class="card-body">
                  <h5 class="card-title">
                    <strong>{{ $corte->maestria->nombre }}</strong>
                  </h5>
                  <p class="card-text">
                    <strong>Título en: </strong>{{ $corte->maestria->titulo }}
                  </p>
                  <p class="card-text">
                      <strong>Corte {{ $corte->numero }} </strong>
                    </p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                  <a href="{{ route('incripcion',$corte->id) }}" class="btn btn-dark btn-block btn-lg">
                    Inscribirme
                    <i class="fas fa-user-edit fa-2x"></i>
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
