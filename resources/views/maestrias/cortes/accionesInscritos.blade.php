<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
  
    <a  href="{{route('informacionInscritoCorteMaestria',$inscripcion->id)}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Datos de inscripción de {{ $inscripcion->user->apellidos . ' ' . $inscripcion->user->nombres }}">
        <i class="fa fa-eye"></i>
    </a>   
</div>