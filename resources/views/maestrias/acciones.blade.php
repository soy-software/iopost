<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{ route('informacionMaestria',$maestria->id) }}" class="btn btn-dark"  data-toggle="tooltip" data-placement="top" title="Información de {{ $maestria->nombre }}">
        <i class="fas fa-eye"></i>
    </a>
    <a  href="{{ route('editarMaestria', $maestria->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar {{ $maestria->nombre }}">
        <i class="fas fa-edit"></i>
    </a>
    <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarMaestria', $maestria->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-title="Eliminar {{ $maestria->nombre }}" title="Eliminar {{ $maestria->nombre }}">
        <i class="fas fa-trash-alt"></i>
    </button> 
    <a  href="{{ route('cortesMaestria', $maestria->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Cortes de {{ $maestria->nombre }}">
        <i class="icon-reading"></i>
    </a> 
    <a  href="{{ route('materiaMaestria', $maestria->id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Materias de {{ $maestria->nombre }}">
        <i class="icon-paste"></i>
    </a>   
</div>

