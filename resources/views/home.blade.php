@extends('layouts.app',['title'=>'Bienvenido'])

@section('content')
<div class="card">
    <div class="card-header">Bienvenido</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @foreach (Auth::user()->getRoleNames() as $rol)
        {{ $rol }},
        @endforeach
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuHome').addClass('active');  
    </script>
@endprepend

@endsection
