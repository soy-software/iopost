@if (Storage::exists($inscripcion->comprobante))
    <img src="" alt="">
    <a href="{{ Storage::url($inscripcion->comprobante) }}" data-toggle="tooltip" data-placement="top" title="Ver comprobante" class="btn btn-info">
        <i class="fas fa-file-image"></i>
    </a>
@endif