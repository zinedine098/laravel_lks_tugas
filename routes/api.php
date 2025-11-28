<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;

// Rute Publik (Register & Login)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rute yang Dilindungi (Membutuhkan token: 'auth:sanctum')
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    // Tambahkan rute API lain yang butuh otentikasi di sini
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index']);
    // Tambahkan rute admin lainnya di sini
});