@if (count($inscripciones)>0)
<table class="table table-bordered" id="table-registro">
    <thead>
        <tr>
            <th scope="col">Ingresar</th>
            <th scope="col">Aspirante</th>
            <th scope="col">Identificación</th>
            <th scope="col">Email</th>

            <th scope="col">Fecha de registro</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inscripciones as $ins)
        <tr>

            <td>
                <a href="" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ingresar">
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </td>

            <td>
                {{ $ins->user->primer_apellido }} {{ $ins->user->segundo_apellido }} {{ $ins->user->primer_nombre }} {{ $ins->user->segundo_nombre }}
            </td>
            <td>
                {{ $ins->user->identificacion }}
            </td>
            <td>
                {{ $ins->user->email }}
            </td>

            <td>
                {{ $ins->created_at }}
                <small>{{ $ins->created_at->diffForHumans() }}</small>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
    <div class="alert alert-dark" role="alert">
        <strong>No existe registros</strong>
    </div>
@endif

<script>

$('#table-registro').DataTable({
    "paging":   false,
    "ordering": false,
    "info":     true,
    "language":{
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
        }
    }
});
</script>
