<h2 class="text-danger">Maestría.</h2>
@include('maestrias.info',['maestria'=>$inscripcion->corte->maestria])
<h2 class="text-danger">Corte.</h2>
@include('maestrias.cortes.info',['corte'=>$inscripcion->corte])
<h2 class="text-danger">Inscripción.</h2>
@include('inscripciones.informacion',['inscripcion'=>$inscripcion])
<h2 class="text-danger">Estudiante.</h2>
@include('usuarios.usuarios.info',['usuario'=>$inscripcion->user])