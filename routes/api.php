<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//u/ mengelola resource buku dan produk, kita akan menggunakan controller yang sudah dibuat sebelumnya
use App\Http\Controllers\Api\BooksController;
use App\Http\Controllers\Api\ProductController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ping', function () { 
return response()->json(['message' => 'pong']); 
});


//Route API Resource
Route::apiResource('/books', BooksController::class);
Route::apiResource('/products', ProductController::class);
