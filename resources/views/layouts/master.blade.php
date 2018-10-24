<!DOCTYPE html>
<html>
	<head>
		<title>
			Gigs for Bands - @yield('title')
		</title>
		@include('layouts._header')

		@include('layouts.assets')
	</head>

	<body>
		@include('layouts.navigation')
		<div class='content-holder'>
			<div class='content'>
				@if( session('message'))
					<div class="alert alert-success" role="alert">
  						{{ session('message') }}
					</div>
				@endif

				@if( session('error'))
					<div class="alert alert-danger" role="alert">
						{{ session('error') }}
					</div>
				@endif
				@yield('content')
			</div>
		</div>
		@include('forms.modal')
	</body>
</html>
