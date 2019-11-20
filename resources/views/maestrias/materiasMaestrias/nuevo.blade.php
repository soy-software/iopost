@extends('layouts.app',['title'=>'Nueva materia'])

@section('breadcrumbs', Breadcrumbs::render('nuevaMateriaMaestria',$maestria))

@section('content')
<form action="{{ route('guardarMateriaMaestria') }}" method="POST" >
    @csrf
    <input type="hidden" name="maestria" id="maestria" value="{{$maestria->id}}">
    <div class="card">
        <div class="card-header">Nueva materia </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre de la materia:<i class="text-danger">*</i></label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre') }}" placeholder="Seminario II. Elaboracion de Informes y Socializan de Resultados" required>
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:<i class="text-danger">*</i></label>
                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</form>

@prepend('linksPie')
    <script>
    $('#menuMaestria').addClass('active');    
    </script>
@endprepend
@endsection