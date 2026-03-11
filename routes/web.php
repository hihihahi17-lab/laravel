 <?php


/* use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\ProductController;



Route::prefix('api')->group(function () {
    Route::apiResource('products', ProductController::class);
}); */



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;

Route::get('/', function () {
    return view('welcome');
});

// API routes (accessible at /api/loan)
Route::prefix('api')->group(function () {
    Route::resource('loans', LoanController::class);
});