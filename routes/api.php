<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\ProductDescriptionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::apiResource('categories',CategoryController::class);
Route::apiResource('tags',TagController::class);
Route::apiResource('units',UnitController::class);
Route::apiResource('products',ProductContoller::class);
Route::apiResource('productdescriptions',ProductDescriptionController::class);