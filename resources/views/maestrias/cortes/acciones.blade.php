<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarCorte', $corte->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-title="Eliminar Corte número {{ $corte->numero }}" title="Eliminar {{ $corte->numero }}">
        <i class="fas fa-trash-alt"></i>
    </button> 
    {{-- <a  href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Corte número {{ $corte->numero }}">
        <i class="icon-reading"></i>
    </a>    --}}
</div>