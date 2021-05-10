@extends('templates.template')

@section('content')
    <h1 class="text-center" id="title-page">@if(isset($people))Editar @else Cadastrar @endif</h1>

    <div class="col-8 m-auto">
    	
    	@if(isset($errors) && count($errors)>0)
    	<div class="text-center mt-4 mb-4 p-2 alert-danger">
    		@foreach($errors->all() as $erro)
    			{{$erro}} <br>
    		@endforeach
    	</div>
    	@endif
    	
        @if(isset($people))
            <form name="formEdit" id="formEdit" method="post" action="{{url("people/$people->id/edit")}}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{ route('save_people')}}">
        @endif
    		@csrf
            <div class="form-group form-control">
                <label for="name">Nome</label>
    		    <input class="form-control" type="text" name="name" id="name" value="{{$people->name ?? ''}}" required>
                <label for="cpf">CPF</label>
        		<input class="form-control" type="text" name="cpf" id="cpf" value="{{$people->cpf ?? ''}}" required>
                <label for="cpf">Data de Nascimento</label>
                <input class="form-control" type="date" name="birthdate" id="birthdate" value="{{$people->birthdate ?? ''}}" required>
                <label for="email">E-mail</label>
        		<input class="form-control" type="text" name="email" id="email" value="{{$people->email ?? ''}}" required>
                <label for="email">Telefone</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{$people->phone ?? ''}}" required>
                <label for="posts">Posts</label>
                <select class="form-control" name="post" id="post" required>
                    @php //options serão gerados via Js @endphp
                </select>
                <br>
    		    <input class="btn btn-primary" type="submit" value="@if(isset($people))Editar @else Cadastrar @endif" required>
            </div>
    	</form>
    </div>
@endsection