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
            <td colspan="2">
                <strong>Comprobante:</strong>{{ $inscripcion->comprobante?'SUBIDO':'SIN SUBIR' }}
            </td>
        </tr>
    </tbody>
</table>