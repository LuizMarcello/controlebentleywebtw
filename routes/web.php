<?php

/* Inicialmente não havia este "use". Dizia que o controller não existia. */

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AuthenticationController;


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

/* Método group(): Agrupa rotas. */
/* Aplicando o middleware "auth" ao grupo de rotas. */
/* Acesso a este grupo de rotas somente se logado. */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', HomePage::class)->name('home');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email', function () {
    Mail::send('auth.passwords.email', ['curso' => 'Eloquent'], function ($m) {
        $m->from('luizmarcelloti@gmail.com', 'Luiz');
        $m->subject('Email de teste');
        $m->to('luizmarcello.vmo@hotmail.com');
    });
});

/* Rota somente para usuários não logados, não autenticados */
/* Middleware "guest" */
/* Acesso a este grupo de rotas, somente se "não" estiver logado. */
Route::group(['middleware' => 'guest'], function () {
    /* Quando vem de links em páginas web, é sempre "GET". */
    /* Quando vem de formulários, é sempre "POST". */

    /* Rota que mostrará o formulário de registro */
    Route::get('/register', [RegisterController::class, 'create']);

    /* Rota que criará o registro de usuários */
    Route::post('/register', [RegisterController::class, 'store'])->name('register');

    /* Rota que mostrará o formulário de login */
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login.form');

    /* Rota que vai logar o usuário, autenticar ele */
    Route::post('/login', [AuthenticationController::class, 'logar'])->name('login');

    /* Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout'); */

    Route::get('/forget-password', [PasswordResetController::class, 'request'])->name('password.request');

    Route::post('/forget-password', [PasswordResetController::class, 'email'])->name('password.email');

    Route::get('/reset-password', [PasswordResetController::class, 'reset'])->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
});

/* Middleware para garante o acesso a esta rota somente se logado. */
//Route::get('/home', HomePage::class)->name('home')->middleware('auth');
