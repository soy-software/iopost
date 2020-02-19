<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ucfirst($title ?? '') }} {{ config('app.name', 'UTC-POSGRADOS') }}</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('fonts/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('fonts/fontawesome-free-5.11.2-web/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<script src="{{ asset('js/notify.min.js') }}"></script>

	<script src="{{ asset('js/app.js') }}"></script>
	<!-- /theme JS files -->

	@stack('linksCabeza')

	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>


</head>

<body>

	<!-- Main navbar -->
    @include('layouts.cabecera')
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		@auth
			@include('layouts.menu')
		@endauth
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							@yield('breadcrumbs')
						</div>

						{{--  si existe barra laterla se muestra  --}}
						@hasSection('barraLateral')
							<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
						@endif
					</div>

					<div class="header-elements d-none">
						@yield('barraLateral')
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
                @if ($errors->any())

                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

				@endif

				@foreach (['success', 'warn', 'info', 'error'] as $msg)
					@if(Session::has($msg))
					<script>
						$.notify("{{ Session::get($msg) }}", "{{ $msg }}");
					</script>
					@endif
				@endforeach


                @yield('content')
			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				@include('layouts.footer')
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
		$('table').on('draw.dt', function() {
			$('[data-toggle="tooltip"]').tooltip();
		})

		function eliminar(arg){
			var url=$(arg).data('url');
			var msg=$(arg).data('title');
			$.confirm({
				title: 'Confirme!',
				content: msg,
				theme: 'modern',
				type:'dark',
				icon:'far fa-sad-cry',
				closeIcon:true,
				buttons: {
					confirmar: function () {
						location.replace(url);
					}
				}
			});
		}
	</script>

	@stack('linksPie')
</body>
</html>
