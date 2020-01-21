@extends('layouts.app',['title'=>'Importar notas de examen de admisión'])



@section('barraLateral')

@endsection


@section('content')
<form action="" method="" enctype="multipart/form-data">
    @csrf
<div class="card">
    <div class="card-header">
        <strong>Advertencia:</strong> el archivo excel debe contener extrictamente el siguente formato.
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Nota de examen</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                        david.criollo@utc.edu.ec
                    </th>
                    <td>7.00</td>
                  </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group mt-2">
            <label for="exampleFormControlFile1">Selecionar archivo excel<i class="text-danger">*</i></label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="archivo">
        </div>
    </div>
    <div class="card-footer text-muted">
        <button type="button" class="btn btn-primary">
            Importar notas
        </button> 
    </div>
</div>
</form>



@prepend('linksPie')
    <script>
    $('#menuMaestria').addClass('active');  
    </script>
@endprepend

@endsection
