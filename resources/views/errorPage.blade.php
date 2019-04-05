<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gestion financiere</title>
	<link rel="stylesheet" href="{{ asset('css/error.css') }}">
</head>
<body>
	<a href="" class="space-error text-error">
		@if (Session::has('message'))
		<div>
			<h1>Erreur !</h1>
			<p>
				{{ Session::get('message') }}
			</p>
		</div>
	@endif
	</a>
</body>
</html>