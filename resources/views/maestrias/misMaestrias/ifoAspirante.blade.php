<div class="btn-group btn-group-sm" role="group" aria-label="...">
        <a href="{{ route('informacionAspirante',$insc->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Información de {{ $insc->user->nombres }} {{ $insc->user->apellidos }}">
            <i class="fa fa-eye"></i>
        </a>
    </div>