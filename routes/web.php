<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pessoas', [PessoaController::class, 'index']);
Route::post('/pessoas', [PessoaController::class, 'store']);
Route::get('/pessoas/create', [PessoaController::class, 'create']);
Route::get('/pessoas/{pessoa}/edit', [PessoaController::class, 'edit']);
Route::put('/pessoas/{pessoa}', [PessoaController::class, 'update']);
Route::delete('/pessoas/{pessoa}', [PessoaController::class, 'delete']);
Route::get('/pessoas/genero', [PessoaController::class, 'get_gender']);
