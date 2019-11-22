@if (Storage::exists($inscripcion->comprobante))
    <button type="button" onclick="verComprobante(this);" data-url="{{ Storage::url($inscripcion->comprobante) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Ver comprobante de registro">
        <i class="fas fa-eye"></i>
    </button>         
@endif