<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/user', [UserController::class, 'store']);
//add data
Route::post('/pos',[ProductController::class,'pro']);

Route::get('/products',[UserController::class,'show']);

Route::post('login',[UserController::class,'login']);


Route::delete('delete/{id}',[ProductController::class,'delete']);



Route::post('/store', [CustomerController::class, 'store'])->name('store');
Route::get('/show', [CustomerController::class, 'show']);
Route::get('/login', [LoginController::class, 'loginCheck']);
