<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Validation\Rule;


class PessoaController extends Controller
{
    public function index()
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
            'email' => 'required|unique:pessoas',
            'senha' => 'required',
        ]);

        Pessoa::create([
            'nome' => request('nome'),
            'sobrenome' => request('sobrenome'),
            'data_nascimento' => request('data_nascimento'),
            'email' => request('email'),
            'senha' => request('senha'),
        ]);

        return redirect('/pessoas/genero');
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
            'email' => [
                'required',
                Rule::unique('pessoas')->ignore($pessoa->id),
            ],
            'data_nascimento' => 'required|before:today',
            'senha' => 'required',
        ]);

        $pessoa->update([
            'nome' => request('nome'),
            'sobrenome' => request('sobrenome'),
            'data_nascimento' => request('data_nascimento'),
            'email' => request('email'),
            'senha' => request('senha'),
        ]);

        return redirect('/pessoas/genero');
    }

    public function delete(Pessoa $pessoa)
    {
        $pessoa->delete();

        return redirect('/pessoas');
    }

    public function get_gender()
    {
        $pessoas = Pessoa::get();

        foreach ($pessoas as $pessoa) {
            $url = "https://gender-api.com/get?name={$pessoa->nome}&country=BR&key=sfq5G43wt3BNfABQPjxEsZLDevhqNz9k6GgA";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $resultado = json_decode(curl_exec($ch));

            echo "Nome: " . $resultado->name . "<br>";
            if ($resultado->gender == 'male') {
                $pessoa->update(['genero' => value('Masculino')]);
            } else if ($resultado->gender == 'female') {
                $pessoa->update(['genero' => value('Feminino')]);
            } else {
                $pessoa->update(['genero' => value('Desconhecido')]);
            }
        }

        return redirect('/pessoas');
    }
}
