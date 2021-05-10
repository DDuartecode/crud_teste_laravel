@extends('templates.template')

@section('content')
   	<h1 class="text-center" id="title-page">Crud</h1>

   	<div class="text-center mt-3 mb-4">
   		<a href="{{route('cad_people')}}">
   			<button class="btn btn-success show-cad">Cadastrar</button>
   		</a>
   	</div>

   	<div class="col-8 m-auto">
   		@csrf
	   	<table class="table table-striped table-dark text-center">
		  	<thead>
		   		<tr>
		      		<th scope="col">Id</th>
		     		<th scope="col">Nome</th>
		      		<th scope="col">CPF</th>
		      		<th></th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  	@foreach($peoples as $people)

		  		<tr>
			      	<th scope="row">{{$people->id}}</th>
			      	<td>{{$people->name}}</td>
			      	<td>{{$people->cpf}}</td>
			     	<td>
			     		<a href="{{url("people/$people->id/show")}}">
			     			<button class="btn btn-dark">Visualizar</button>
			     		</a>

			     		<a class="show-edit" href="{{url("people/$people->id/edit")}}">
			     			<button class="btn btn-primary">Editar</button>
			     		</a>

			     		<a class="js-del" href="{{url("people/$people->id/del")}}">
			     			<button class="btn btn-danger">Deletar</button>
			     		</a>
			     	</td>
		    	</tr>
		  	@endforeach
		  </tbody>
		</table>
	</div>
@endsection