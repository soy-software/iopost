@extends('layouts.app',['title'=>'nueva de maestría'])

@section('breadcrumbs', Breadcrumbs::render('nuevaMateriaMaestria',$maestria))

@section('content')
<div class="card">
        <div class="card-header">Nueva Maestría </div>

        <div class="card-body">
            <form action="{{ route('guardarMateriaMaestria') }}" method="POST" >
                @csrf
                <input type="hidden" name="maestria" id="maestria" value="{{$maestria->id}}">
                <div class="form-group">
                    <label for="nombre">Nombre de la materia</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre') }}" placeholder="Seminario II. Elaboracion de Informes y Socializan de Resultados">
                     @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                     @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
</div>
@endsection