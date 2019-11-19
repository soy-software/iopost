<table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Identificación</th>
        <th scope="col">Email</th>
        <th scope="col">Celular</th>
        <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        @php($i=0)
        @foreach ($inscripciones as $inscripcion)
        @php($i++)
            <tr>
                <th scope="row">
                    {{ $i }}
                </th>
                <td>
                    {{ $inscripcion->user->nombres }}
                </td>
                <td>
                    {{ $inscripcion->user->apellidos }}
                </td>
                <td>
                    {{ $inscripcion->user->identificacion }}
                </td>
                <td>
                    {{ $inscripcion->user->email }}
                </td>
                <td>
                    {{ $inscripcion->user->celular }}
                </td>
                <td>
                    {{ $inscripcion->estado }}
                </td>
            </tr>      
        @endforeach
        
    </tbody>
</table>