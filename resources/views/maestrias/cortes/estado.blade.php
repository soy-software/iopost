
<select class="form-control form-control-sm" onchange="estadoCorte(this)"  data-id="{{$corte->id}}" data-title="Cambiar estado de la corte {{$corte->numero}}">
    <option value="Promoción"  {{$corte->estado=='Promoción'?'selected':''}}>Promoción</option>
    <option value="Registro" {{$corte->estado=='Registro'?'selected':''}} >Registro</option>
    <option value="Proceso académico" {{$corte->estado=='Proceso académico'?'selected':''}}>Proceso académico</option>
    <option value="Finalizado" {{$corte->estado=='Finalizado'?'selected':''}}>Finalizado</option>
</select>
