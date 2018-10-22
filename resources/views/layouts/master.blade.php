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
				@yield('content')
			</div>
		</div>
	</body>
</html>
