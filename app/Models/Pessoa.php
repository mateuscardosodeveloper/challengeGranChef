<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';

    protected $fillable = [
        'nome',
        'sobrenome',
        'data_nascimento',
        'genero',
        'email',
        'senha',
    ];

    public function setSenhaAttribute($senha)
    {
        $this->attributes['senha'] = Hash::make($senha);
    }

}
