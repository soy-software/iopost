<table class="table table-bordered">
    
    <tbody>
        <tr>
            <th scope="row">
                Fecha de inscripción: <strong>{{ $inscripcion->created_at }}</strong>
            </th>
            <td>
                Estado: <strong>{{ $inscripcion->estado }}</strong>
            </td>
        </tr>
        <tr>
            <th scope="row" colspan="2">
                Comprobante: <strong>{{ $inscripcion->comprobante?'SUBIDO':'SIN SUBIR' }}</strong>
            </th>
        </tr>
    </tbody>
</table>