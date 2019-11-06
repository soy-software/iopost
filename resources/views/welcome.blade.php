@extends('layouts.app',['title'=>'Bienvenido'])

@section('content')
<div class="card">
  <div class="card-header text-center">
    UNIVERSIDAD TÉCNICA DE COTOPAXI
  </div>
  <div class="card-body">
    @if (count($cortes)>0)
      <div class="row">  
        @foreach ($cortes as $corte)
        
          <div class="col-md-4">

            <div class="card">
              <a href="#">
                <img class="card-img-top img-fluid" src="http://demo.interface.club/limitless/demo/bs4/Template/global_assets/images/demo/flat/1.png" alt="">
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
                <a href="" class="btn btn-dark btn-block btn-lg">
                  Inscribirme
                  <i class="fas fa-user-edit fa-2x"></i>
                </a>
              </div>
            </div>

          </div>
        
        @endforeach
        </div>
    @else
        <div class="alert alert-dark" role="alert">
          <strong>No tenemos promociones por el momento</strong>
        </div>
    @endif
  </div>
</div>
@endsection
