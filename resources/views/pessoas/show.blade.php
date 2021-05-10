@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1>

    <div class="container col-8 m-auto mt-5 content-justify">
        <div class="card" style="width: 18rem;">
		  	<ul class="list-group list-group-flush">
		   		<li class="list-group-item"><b>Nome:</b>    {{$people->name}}</li>
		    	<li class="list-group-item"><b>CPF:</b>    {{$people->cpf}}</li>
		    	<li class="list-group-item"><b>Data de Nascimento:</b>  {{$people->birthdate}}</li>
		    	<li class="list-group-item"><b>email:</b>      {{$people->email}}</li>
		    	<li class="list-group-item"><b>phone:</b> 		{{$people->phone}}</li>
		    	<li class="list-group-item"><b>post:</b>     {{$people->post}}</li>
		  	</ul>
		</div>
    </div>
@endsection