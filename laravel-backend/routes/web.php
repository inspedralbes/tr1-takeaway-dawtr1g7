<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LlibresController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('/llibres', [LlibresController::class, 'adminIndex'])->name('llibres');
Route::get('/llibres/afegir', [LlibresController::class, 'createEvent'])->name('nou-esdeveniment');

Route::get('/categories', [CategoriesController::class, 'adminIndex'])->name('categories');