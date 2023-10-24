<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LlibresController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComandesController;

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

// Public
Route::get('/llibres', [LlibresController::class,'index']);
Route::get('/categories', [CategoriesController::class,'index']);
Route::get('/comandes', [ComandesController::class,'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
