@if (count($corte->coordinadores)>0)
    @foreach ($corte->coordinadores as $coor)
    {{ $coor->primer_nombre }} {{ $coor->segundo_nombre }} {{ $coor->primer_apellido }} {{ $coor->segundo_apellido }} <small>{{ $coor->email }}</small>
    @endforeach
@endif