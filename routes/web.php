<?php

/* Inicialmente não havia este "use". Dizia que o controller não existia. */

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\AuthenticationController;

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

Route::get('/home', HomePage::class)->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'create']);

/* Quando vem de links em páginas web, é sempre "GET". */
/* Quando vem de formulários, é sempre "POST". */
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [AuthenticationController::class, 'login'])->name('login.form');

Route::post('/login', [AuthenticationController::class, 'logar'])->name('login');

/* Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout'); */

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
