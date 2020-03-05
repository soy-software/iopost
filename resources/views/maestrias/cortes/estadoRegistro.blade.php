
<select class="form-control" id="exampleFormControlSelect1" onchange="cambiarEstadoRegistro(this);" data-id="{{ $inscripcion->id }}">
    <option value="Registro" {{ $inscripcion->estado=='Registro'?'selected':'' }}>Registro</option>
    <option value="Inscrito" {{ $inscripcion->estado=='Inscrito'?'selected':'' }}>Inscrito</option>
    <option value="Matriculado" {{ $inscripcion->estado=='Matriculado'?'selected':'' }}>Matriculado</option>
</select>
