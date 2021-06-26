<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index(Request $request)
    {
        $pessoas = Pessoa::all();

        return view('pessoas.index', ['pessoas' => $pessoas]);
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store()
    {
        request()->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'data_nascimento' => 'required|before:today',
            'email' => 'required',
            'senha' => 'required',
        ]);

        Pessoa::create([
            'nome' => request('nome'),
            'sobrenome' => request('sobrenome'),
            'data_nascimento' => request('data_nascimento'),
            'email' => request('email'),
            'senha' => request('senha'),
        ]);

        return redirect('/pessoas');
    }

    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', ['pessoa' => $pessoa]);
    }

    public function update(Pessoa $pessoa)
    {
        request()->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'data_nascimento' => 'required|before:today',
            'email' => 'required',
            'senha' => 'required',
        ]);

        $pessoa->update([
            'nome' => request('nome'),
            'sobrenome' => request('sobrenome'),
            'data_nascimento' => request('data_nascimento'),
            'email' => request('email'),
            'senha' => request('senha'),
        ]);


        return redirect('/pessoas');
    }

    public function delete(Pessoa $pessoa)
    {
        $pessoa->delete();

        return redirect('/pessoas');
    }

    public function gender(Request $request)
    {
        return view('pessoas.gender');
    }
}
