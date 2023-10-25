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

//RUTES LLIBRES
Route::get('/llibres', [LlibresController::class, 'adminIndex'])->name('llibres');
Route::get('/llibres/afegir', function () { return view('llibres.afegir');})->name('view-afegir-llibre');
Route::post('/llibres/afegir', [LlibresController::class, 'adminStore'])->name('afegir-llibre');
Route::get('/llibres/modificar/{id}', [LlibresController::class, 'adminShow'])->name('view-modificar-llibre');
Route::patch('/llibres/modificar/{id}', [LlibresController::class, 'adminUpdate'])->name('modificar-llibre');
Route::delete('/llibres/{id}', [LlibresController::class, 'adminDelete'])->name('eliminar-llibre');

//RUTES CATEGORIES
Route::get('/categories', [CategoriesController::class, 'adminIndex'])->name('categories');
Route::get('/categories/afegir', function () { return view('categories.afegir');})->name('view-afegir-categoria');
Route::post('/categories/afegir', [CategoriesController::class, 'adminStore'])->name('afegir-categoria');
Route::get('/categories/modificar/{id}', [CategoriesController::class, 'adminShow'])->name('view-modificar-categoria');
Route::patch('/categories/modificar/{id}', [CategoriesController::class, 'adminUpdate'])->name('modificar-categoria');
Route::delete('/categories/{id}', [CategoriesController::class, 'adminDelete'])->name('eliminar-categoria');

