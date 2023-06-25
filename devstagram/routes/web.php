<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;
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

Route::get('/', function () {
    return view('principal');
});

// Ruta para ver la vista del registro
Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Ruta para guardar un nuevo usuario
Route::post('/register', [RegisterController::class, 'store']);

// Ruta para mostrar una vista de login
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Ruta para autenticarse
Route::post('/login', [LoginController::class, 'store']);
// Ruta para cerrar sesión
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Ruta para mostrar el perfil
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
// Ruta para mostrar la vista del formulario de creacion de posts
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Ruta para guardar una imagen en uploads
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
// Ruta para guardar un post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Ruta para mostrar la vista de un post
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Ruta para eliminar un post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Ruta para guardar un comentario en un post
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

