<?php

// Se importan los controladores a utilizar

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta para la vista principal de home
Route::get('/', function () {
    return view('principal');
});

// Ruta para vista registro de cuenta
Route::get('/crear', [RegisterController::class, 'index'])->name('register');

// Ruta para enviar datos al servidor
Route::post('/crear', [RegisterController::class, 'store']);

// Ruta para mostrar el dashboard de usuario autenticado
Route::get('/muro', [PostController::class, 'index'])->name('post.index');

// Ruta del login
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Ruta de validación de login
Route::post('/login', [LoginController::class, 'store']);

//Ruta de logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
