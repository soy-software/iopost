<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{ route('informacionUsuario',$usuario->id) }}" class="btn btn-dark"  data-toggle="tooltip" data-placement="top" title="Información de {{ $usuario->nombres.' '.$usuario->nombres }}">
        <i class="fas fa-eye"></i>
    </a>

    @can('editar', $usuario)
        <a  href="{{ route('editarUsuario', $usuario->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar {{ $usuario->nombres.' '.$usuario->nombres }}">
            <i class="fas fa-edit"></i>
        </a>        
    @endcan
    
    @can('eliminar', $usuario)
        <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarUsuario',$usuario->id) }}"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-title="Eliminar {{ $usuario->email }}">
            <i class="fas fa-trash-alt"></i>
        </button>        
    @endcan
    
</div>