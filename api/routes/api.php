<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function (){
    Route::post('login', [AuthController::class, 'store'])->name('auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::middleware('auth:sanctum')->get('get', [AuthController::class, 'show'])->name('auth.getUser');
});

Route::prefix('list')->group(function () {
    Route::middleware('auth:sanctum')->post('register', [ListController::class, 'store'])->name('list.register');
    Route::middleware('auth:sanctum')->get('show', [ListController::class, 'show'])->name('list.show');
});
