<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    
    // Dashboard compartido (redirige según el rol en el controlador)
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    // Rutas exclusivas para ADMIN
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
        // Aquí irán otras rutas de administración
    });

    // Rutas exclusivas para MECÁNICOS
    Route::middleware(['role:mecanico'])->prefix('mecanico')->group(function () {
        Route::get('/dashboard', function () {
            return view('mecanico.dashboard');
        });
    });
});