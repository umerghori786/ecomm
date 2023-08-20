<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Api\HomeConroller;
use App\Http\Controllers\Frontend\Api\ProductController;
use App\Http\Controllers\Frontend\Api\ProductShowController;
use App\Http\Controllers\Frontend\Api\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home',HomeConroller::class);
Route::get('/products',ProductController::class);
Route::get('/product/show/{id}',ProductShowController::class);
Route::get('/categeory',CategoryController::class);

