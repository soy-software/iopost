<table class="table table-bordered">
    
    <tbody>
        <tr>
            <td>
                <strong>Fecha de inscripción:</strong> {{ $inscripcion->created_at }}
            </td>
            <td>
                <strong>Estado:</strong>{{ $inscripcion->estado }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Comprobante:</strong>{{ $inscripcion->comprobante?'SUBIDO':'SIN SUBIR' }}
            </td>
            <td>
                <strong>Valor a cancelar:</strong> {{ $inscripcion->valorMatricula }}
            </td>
        </tr>
    </tbody>
</table>