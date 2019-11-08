<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarCorte', $corte->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-title="Eliminar Corte número {{ $corte->numero }}" title="Eliminar {{ $corte->numero }}">
        <i class="fas fa-trash-alt"></i>
    </button> 
    <a  href="{{route('inscritosCorteMaestria',$corte->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Inscritos en la Corte número {{ $corte->numero }}">
        <i class="fa fa-users"></i>
    </a>   
</div>