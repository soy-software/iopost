
<select class="form-control form-control-sm" onclick="estadoCorte(this)"  data-id="{{$corte->id}}" data-title="Cambiar estado de la corte {{$corte->numero}}">
    <option value="Promoción"  {{$corte->estado=='Promoción'?'selected':''}}>Promoción</option>
    <option value="Inscripciones" {{$corte->estado=='Inscripciones'?'selected':''}} >Inscripciones</option>
    <option value="Proceso" {{$corte->estado=='Proceso'?'selected':''}}>Proceso</option>
    <option value="finalizado" {{$corte->estado=='finalizado'?'selected':''}}>finalizado</option>
    <option value="Cancelada" {{$corte->estado=='Cancelada'?'selected':''}}>Cancelar</option>
</select>
