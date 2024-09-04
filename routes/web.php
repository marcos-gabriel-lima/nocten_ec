<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Rota protegida que só pode ser acessada por usuários autenticados e com permissão 'manage products'
Route::middleware(['auth', 'permission:manage products'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
});

// Rota para o dashboard, acessível apenas para usuários autenticados
Route::get('/dashboard', function () {
    return view('dashboard');  // Garante que a view do dashboard seja carregada
})->middleware(['auth', 'verified'])->name('dashboard');

// Rota para a página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas relacionadas ao perfil do usuário, todas protegidas pela autenticação
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inclusão das rotas de autenticação
require __DIR__.'/auth.php';
