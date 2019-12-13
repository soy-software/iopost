@if (count($corte->coordinadores)>0)
    @foreach ($corte->coordinadores as $coor)
        {{ $coor->nombres }} {{ $coor->apellidos }} <small>{{ $coor->email }}</small> <br>
    @endforeach
@endif