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

use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('index');
});

route::get('/home', [HomeController::class, 'index'])->name('home');

route::get('/acao', [AcaoController::class, 'index'])->name('acao');

route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro');
route::POST('/cadastro', [CadastroController::class, 'create'])->name('cadastro');

route::get('/conta', [ContaController::class, 'index'])->name('conta');

route::get('/streaming', [StreamingController::class, 'index'])->name('streaming');

route::get('/romance', [RomanceController::class, 'index'])->name('romance');

route::get('/membro', [MembroController::class, 'index'])->name('membro');

route::get('/login', [UsuarioController::class, 'login'])->name('login');
route::POST('/login', [UsuarioController::class, 'login'])->name('login');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');


route::get('/infantil', [InfantilController::class, 'index'])->name('infantil');
