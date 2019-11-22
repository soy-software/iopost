<div class="btn-group btn-group-sm" role="group" aria-label="...">
    <button type="button" onclick="aprobarRegistro(this);" data-id="{{ $inscripcion->id }}" data-aspirante="{{ $inscripcion->user->nombres.' '.$inscripcion->user->apellidos }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Aprobar registro de maestría">
        <i class="fas fa-user-check"></i>
    </button>
</div>