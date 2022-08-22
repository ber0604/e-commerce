<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcaoController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\StreamingController;
use App\Http\Controllers\RomanceController;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InfantilController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('index');
});

route::get('/home', [HomeController::class, 'index'])->name('home');

route::match(['get', 'post'], '/', [ProdutoController::class, 'index'])->name('home');
//route::match(['get', 'post'], '/', [ProdutoController::class, 'genero'])->name('genero');

route::match(['get', 'post'], '/cadastro', [CadastroController::class, 'cadastro'])->name('home');

route::get('/conta', [ContaController::class, 'index'])->name('conta');

route::get('/login', [UsuarioController::class, 'login'])->name('login');
route::POST('/login', [UsuarioController::class, 'login'])->name('login');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');


