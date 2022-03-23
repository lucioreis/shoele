<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get("/detail/{id}", [ProductController::class, 'show']);

Route::get('/', [ProductController::class, 'index']);


Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::get('/signup', function () {
  return inertia('SignView');
});

Route::get('/about', function () {
  return inertia('About');
});


Route::middleware('auth')->group(function () {
  Route::get('/admin', function () {
    return Inertia::render('Admin');
  });

  Route::get('/finalizar', function () {
    return inertia('FinalizarCompra');
  });
});
