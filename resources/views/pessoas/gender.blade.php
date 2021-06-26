@extends('layouts.app')

@section('content')

<h1>Genero</h1>

<?php

use App\Models\Pessoa;

$pessoas = Pessoa::get('nome');

foreach ($pessoas as $pessoa) {
    $url = "https://gender-api.com/get?name={$pessoa->nome}&country=BR&key=sfq5G43wt3BNfABQPjxEsZLDevhqNz9k6GgA";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $resultado = json_decode(curl_exec($ch));

    echo "Nome: " . $resultado->name . "<br>";
    if ($resultado->gender == 'male') {
        echo ' Genero: Masculino <br><hr>';
    } else if ($resultado->gender == 'female') {
        echo ' Genero: Feminino <br><hr>';
    } else {
        echo ' Genero: Desconhecido <br><hr>';
    }
}


?>

@endsection