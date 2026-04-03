<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\AdminWalletController;


Route::middleware('auth:api')->group(function () {
    Route::get('wallet', [WalletController::class, 'balance']);
    Route::post('wallet/spend', [WalletController::class, 'spend']);
});


Route::prefix('admin')->middleware(['auth:api', 'CheckRole:admin'])->group(function () {
    Route::post('wallet/{user}/credit', [AdminWalletController::class, 'credit']);
    Route::post('wallet/{user}/debit', [AdminWalletController::class, 'debit']);
});
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
});