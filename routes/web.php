<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('welcome1');
});
Route::get('/form', function () {
    return view('form');
});
Route::post('/submit', function () {
    $name=request('name');
    $email=request('email');
    request()->validate([
        'name' => 'required|min:3',
        'email' => 'required|email'
    ]);
    return view('result', compact('name','email'));
});


Route::get('/form/{name}', function ($name) {
    
    return view('form1',compact('name'));
})->middleware(ProductMiddleware::class);





