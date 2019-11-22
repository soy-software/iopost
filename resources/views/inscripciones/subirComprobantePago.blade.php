@extends('layouts.app',['title'=>'Subir comprobante de pago'])
@section('breadcrumbs', Breadcrumbs::render('subirComprobantePago',$inscripcion))
@section('content')

@if (Storage::exists($inscripcion->comprobante))
        <div class="alert alert-success" role="alert">
            <strong>COMPROBANTE DE REGISTRO SUBIDO EXITOSAMENTE</strong><br>
            <button type="button" onclick="verComprobante(this);" data-url="{{ Storage::url($inscripcion->comprobante) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver comprobante de registro">
                <i class="fas fa-eye"></i> VER COMPROBANTE
            </button>
        </div>            
@endif

<form action="{{ route('guardarComprobantePago') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="hidden" name="inscripcion" value="{{ $inscripcion->id }}" required>
    <div class="card">
        <div class="card-header">
            Subir comprobante de pago
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="comprobante">Selecionar comprobante de pago, <strong class="text-warning">formatos aceptables (.png .jpg .jpeg .pdf )</strong></label>
                <input type="file" name="foto" class="form-control-file" id="comprobante" accept="image/jpeg,image/jpg,image/png,application/pdf" required>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">Subir comprobante de pago</button>
        </div>
    </div>
</form>

<div class="modal fade bd-example-modal-lg" id="modalComprobanteRegistro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comprobante de registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="comprobanteRegistro" allowfullscreen></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuMisInscripciones').addClass('active');  
    function verComprobante(arg){
        $('#modalComprobanteRegistro').modal('show');
        $('#comprobanteRegistro').attr('src',$(arg).data('url'));
    }
    $('#modalComprobanteRegistro').on('hidden.bs.modal', function (e) {
        $('#comprobanteRegistro').attr('src','');
    })
    </script>
@endprepend

@endsection
