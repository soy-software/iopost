<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    
    <a  href="{{ route('editarmateriaMaestria', $materiaMaestria->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar {{ $materiaMaestria->nombre }}">
        <i class="fas fa-edit"></i>
    </a>
    <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarMateriaMaestria', $materiaMaestria->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-title="Eliminar {{ $materiaMaestria->nombre }}" title="Eliminar {{ $materiaMaestria->nombre }}">
        <i class="fas fa-trash-alt"></i>
    </button> 
   
</div>