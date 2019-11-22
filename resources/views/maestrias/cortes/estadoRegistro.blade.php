
<select class="form-control" id="exampleFormControlSelect1" onchange="cambiarEstadoRegistro(this);" data-id="{{ $inscripcion->id }}">
    <option value="Registro" {{ $inscripcion->estado=='Registro'?'selected':'' }}>Registro</option>
    <option value="Subir comprobante de registro" {{ $inscripcion->estado=='Subir comprobante de registro'?'selected':'' }}>Subir comprobante de registro</option>
    <option value="Aprobado" {{ $inscripcion->estado=='Aprobado'?'selected':'' }}>Aprobado</option>
    <option value="Inscrito" {{ $inscripcion->estado=='Inscrito'?'selected':'' }}>Inscrito</option>
</select>