<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a  href="{{ route('editarCorte', $corte->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar Cohorte {{ $corte->numero}}">
        <i class="fas fa-edit"></i>
    </a> 
    <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarCorte', $corte->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-title="Eliminar Cohorte {{ $corte->numero }}">
        <i class="fas fa-trash-alt"></i>
    </button> 
    <a  href="{{route('inscritosCorteMaestria',$corte->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Registros en la cohorte {{ $corte->numero }}">
        <i class="fa fa-users"></i>
    </a>
    <a  href="{{ route('cuestionario',$corte->id) }}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Cuestionario de preguntas de cohorte {{ $corte->numero }}">
        <i class="fas fa-list-ol"></i>
    </a>
</div>