<?php
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;
// Une seule ligne génère les 5 routes CRUD




Route::apiResource('loans', LoanController::class);

Route::patch('/loans/{id}/return', [LoanController::class, 'returnLoan']);