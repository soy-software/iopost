@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuHome').addClass('active');  
    </script>
@endprepend

@endsection
