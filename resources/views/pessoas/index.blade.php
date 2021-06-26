@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Genero</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Email</th>
            <th scope="col">Buttons</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pessoas as $pessoa)
        <tr>
            <th scope="row"> {{$pessoa->id}} </th>
            <td> {{$pessoa->nome}} </td>
            <td> {{$pessoa->sobrenome}} </td>
            <td> {{$pessoa->genero}} </td>
            <td> {{$pessoa->data_nascimento}} </td>
            <td> {{$pessoa->email}} </td>
            <td>
                <a href="/pessoas/{{$pessoa->id}}/edit">
                    <button class="btn btn-secondary">Edit</button>
                </a>

                <form action="/pessoas/{{$pessoa->id}}" method="POST" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/pessoas/create">
    <button class="btn btn-primary">Criar</button>
</a>

@endsection