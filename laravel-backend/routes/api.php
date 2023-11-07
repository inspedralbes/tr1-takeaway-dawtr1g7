<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LlibresController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComandesController;
use App\Http\Controllers\AuthController;

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
Route::get('/comandes/user/{userId}', [ComandesController::class,'search']);
Route::get('/comanda/{id}', [ComandesController::class,'show']);

// Auth
Route::post('/registre', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

// Route::get('/comandes', [ComandesController::class,'index']);
// Route::get('/comandes/{id}', [ComandesController::class,'show']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/novaComanda', [ComandesController::class,'store']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::patch('/comanda/{id}', [ComandesController::class,'update']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});