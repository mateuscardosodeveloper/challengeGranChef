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
            'name' => 'required',
            'data_nascimento' => 'required|before:today',
            'email' => 'required',
            'senha' => 'required',
        ]);

        Pessoa::create([
            'name' => request('name'),
            'data_nascimento' => request('data_nascimento'),
            'genero' => request('genero'),
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
            'name' => 'required',
            'data_nascimento' => 'required|before:today',
            'email' => 'required',
            'senha' => 'required',
        ]);

        $pessoa->update([
            'name' => request('name'),
            'data_nascimento' => request('data_nascimento'),
            'genero' => request('genero'),
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
}
