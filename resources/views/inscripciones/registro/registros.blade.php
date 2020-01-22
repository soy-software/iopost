@if (count($inscripciones)>0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Estado</th>
            <th scope="col">Comprobante</th>
            <th scope="col"># de registro</th>
            <th scope="col">Aspirante</th>
            <th scope="col">Identificación</th>
            <th scope="col">Email</th>
            <th scope="col"># factura</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col">Valor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inscripciones as $ins)
        <tr>
            <td>
                {{ $ins->estado }}
            </td>
            <td>
                @if (Storage::exists($ins->comprobante))
                    <button type="button" onclick="verComprobante(this);" data-url="{{ Storage::url($ins->comprobante) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Ver comprobante de registro">
                        <i class="fas fa-eye"></i>
                    </button>         
                @endif
            </td>
            <td>
                {{ $ins->id }}
            </td>
            <td>
                {{ $ins->user->primer_nombre }} {{ $ins->user->segundo_nombre }} {{ $ins->user->primer_apellido }} {{ $ins->user->segundo_apellido }}
            </td>
            <td>
                {{ $ins->user->identificacion }}
            </td>
            <td>
                {{ $ins->user->email }}
            </td>
            <td>
                {{ $ins->numero_factura }}
            </td>
            <td>
                {{ $ins->created_at }}
            </td>
            <td>
                {{ $ins->valorMatricula}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

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



@else
    <div class="alert alert-dark" role="alert">
        <strong>No existe registros</strong>
    </div>
@endif