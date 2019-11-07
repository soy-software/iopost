@extends('layouts.app',['title'=>'nueva de maestría'])

@section('breadcrumbs', Breadcrumbs::render('editarMateriaMaestria',$materiaMaestria))

@section('content')
<div class="card">
        <div class="card-header">Editar Materia Maestría </div>

        <div class="card-body">
            <form action="{{ route('actualizarMateriaMaestrias') }}" method="POST" >
                @csrf
                <input type="hidden" name="materiaMaestria" id="materiaMaestria" value="{{$materiaMaestria->id}}">
                <div class="form-group">
                    <label for="nombre">Nombre de la materia</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre',$materiaMaestria->nombre) }}" placeholder="Seminario II. Elaboracion de Informes y Socializan de Resultados">
                     @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{ old('descripcion',$materiaMaestria->descripcion) }}</textarea>
                     @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                        <label for="estado">Estado     </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado" value="1" {{old('estado',$materiaMaestria->estado==true?'checked':'')}}  >
                        <label class="form-check-label" for="estado">
                        Activa
                        </label>
                     </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado" {{old('estado',$materiaMaestria->estado==false?'checked':'')}} value="0">
                        <label class="form-check-label" for="estado">
                            Inactiva
                        </label>
                    </div> 
                    @error('estado')
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