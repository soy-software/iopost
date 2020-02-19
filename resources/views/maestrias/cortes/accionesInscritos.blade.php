<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a  href="{{route('informacionInscritoCorteMaestria',$inscripcion->id)}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Información de {{ $inscripcion->user->primer_nombre . ' ' . $inscripcion->user->segundo_nombre.' '.$inscripcion->user->primer_apellido.' '.$inscripcion->user->segundo_apellido }}">
        <i class="fa fa-eye"></i>
    </a>
    @if (Storage::exists($inscripcion->comprobante))
        <button type="button" class="btn btn-primary" onclick="verCompropbanteRegistro(this);" data-url="{{ Storage::url($inscripcion->comprobante) }}" data-toggle="tooltip" data-placement="top" title="Ver comprobante">
            <i class="fas fa-file-image"></i>
        </button>

    @endif


    <a  href="{{route('verAdmisionEstudiante',$inscripcion->id)}}" target="_blanck" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Admisión de {{ $inscripcion->user->primer_nombre . ' ' . $inscripcion->user->segundo_nombre.' '.$inscripcion->user->primer_apellido.' '.$inscripcion->user->segundo_apellido }}">
        <i class="fas fa-chalkboard-teacher"></i>
    </a>



</div>
