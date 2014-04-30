<html>
	<head>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		{{ HTML::style('css/utility.css'); }}

		@yield('styles')

	</head>
	<body>
		<div class="container">
			<h1>Google Earth project!</h1>
			<a href="http://laravel.com/docs/quick">Saucey sauce for laravel</a>
			<hr>
			<h4>Content</h4>
			
			@yield('content')

		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		{{ HTML::script('js/Earth.js'); }}
		
		@yield('scripts')
		
		{{ HTML::script('js/app.js'); }}

	</body>
</html>