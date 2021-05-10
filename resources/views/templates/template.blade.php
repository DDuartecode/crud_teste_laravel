<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Crud Lumiere</title>
	<link rel="stylesheet" href="{{url('assets/bootstrap-5.0.0-dist/css/bootstrap.min.css')}}">
</head>
<body>
	<nav class="site-header sticky-top py-1">
      	<div class="container-fluid text-right">
        		<a class="py-2 d-none d-md-inline-block" href="{{ route('admin_logout')}}">Sair</a>
     	</div>
    </nav>

	@yield('content')

	<script src="{{url("assets/js/javascript.js")}}"></script>
</body>
</html>