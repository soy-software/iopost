@extends('layouts.app')

@section('content')

<div id="example-basic">
        <h3>Keyboard</h3>
        <section>
            <p>Try the keyboard navigation by clicking arrow left or right!</p>
        </section>
        <h3>Effects</h3>
        <section>
            <p>Wonderful transition effects.</p>
        </section>
        <h3>Pager</h3>
        <section>
            <p>The next and previous buttons help you to navigate through your content.</p>
        </section>
    </div>


@push('linksCabeza')
    <script src="{{ asset('js/jquery.steps.min.js') }}"></script>
@endpush

@prepend('linksPie')
    <script>
            $("#example-basic").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                autoFocus: true
            });
    </script>
@endprepend

@endsection
