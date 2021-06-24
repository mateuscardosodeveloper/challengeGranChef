@extends('layouts.app')

@section('content')
        <div class="w-50 p-3">
            <form method="POST" action="/pessoas">
                @csrf


                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="data_nascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" id="masculino" value="masculino">
                    <label class="form-check-label" for="masculino">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" id="feminino" value="feminino">
                    <label class="form-check-label" for="femenino">
                        Feminino
                    </label>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div>

                <button type="submit" class="btn btn-success">Cadastrar</button>

            </form>
            <br>
            <a href="/pessoas">
                <button class="btn btn-primary">Cancelar</button>
            </a>
        </div>
@endsection