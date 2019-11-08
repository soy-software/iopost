@extends('layouts.app')

@section('content')

<form action="{{ route('guardarComprobantePago') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="hidden" name="inscripcion" value="{{ $inscripcion->id }}" required>
    <div class="card">
        <div class="card-header">
            Subir comprobante de pago
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="comprobante">Selecionar comprobante de pago</label>
                <input type="file" name="foto" class="form-control-file" id="comprobante" required>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">Subir comprobante de pago</button>
        </div>
    </div>
</form>
@prepend('linksPie')
    <script>
    $('#menuHome').addClass('active');  
    </script>
@endprepend

@endsection
