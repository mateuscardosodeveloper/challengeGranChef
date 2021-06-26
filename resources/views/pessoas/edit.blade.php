@extends('layouts.app')

@section('content')
<div class="w-50 p-3">
    <form method="POST" action="/pessoas/{{$pessoa->id}}">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label class="form-label" for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$pessoa->nome}}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="sobrenome">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{$pessoa->sobrenome}}">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{$pessoa->data_nascimento}}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$pessoa->email}}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" value="{{$pessoa->senha}}">
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>

    </form>
    
    <br>
    <a href="/pessoas">
        <button class="btn btn-primary">Cancelar</button>
    </a>
</div>
@endsection