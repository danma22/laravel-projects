<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

// Ruta para ir al dashboard del menú
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta para mostrar los productos
Route::get('/productos', [ProductsController::class, 'index'])->name('products');

// Ruta para mostrar el formulario del nuevo producto
Route::get('/nuevo-producto', [ProductsController::class, 'newProduct'])->name('nuevoProd');

// Ruta para agregar un producto a la tabla en la BD
Route::post('/nuevo-producto', [ProductsController::class, 'store']);

// Ruta para eliminar un producto
Route::post('/delete-producto', [ProductsController::class, 'delete'])->name('deleteProd');

// Ruta praa mostrar el login del formulario
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Ruta para validar el login
Route::post('/login', [LoginController::class, 'store']);

// Ruta para cerrar la sesión
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Ruta ara mostrar el formulario del registro de usuario
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Ruta para registrar el usuario
Route::post('/register', [RegisterController::class, 'store']);


