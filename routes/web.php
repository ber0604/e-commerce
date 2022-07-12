<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcaoController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\StreamingController;
use App\Http\Controllers\RomanceController;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InfantilController;

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

route::get('/home', [HomeController::class, 'index'])->name('home');

route::get('/acao', [AcaoController::class, 'index'])->name('acao');

route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro');

route::get('/conta', [ContaController::class, 'index'])->name('conta');

route::get('/streaming', [StreamingController::class, 'index'])->name('streaming');

route::get('/romance', [RomanceController::class, 'index'])->name('romance');

route::get('/membro', [MembroController::class, 'index'])->name('membro');

route::get('/login', [LoginController::class, 'index'])->name('login');

route::get('/infantil', [InfantilController::class, 'index'])->name('infantil');
