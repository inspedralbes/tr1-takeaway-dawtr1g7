<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LlibresController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComandesController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\UsersController;

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
    return view('admin-landing');
})->name('admin');

//RUTES LLIBRES
Route::get('/llibres', [LlibresController::class, 'adminIndex'])->name('llibres');
Route::get('/llibres/filtre', [LlibresController::class, 'adminFiltra'])->name('view-llibres-filtrats');
Route::get('/llibres/afegir', function () { return view('llibres.afegir');})->name('view-afegir-llibre');
Route::post('/llibres/afegir', [LlibresController::class, 'adminStore'])->name('afegir-llibre');
Route::get('/llibres/modificar/{id}', [LlibresController::class, 'adminShow'])->name('view-modificar-llibre');
Route::patch('/llibres/modificar/{id}', [LlibresController::class, 'adminUpdate'])->name('modificar-llibre');
Route::delete('/llibres/{id}', [LlibresController::class, 'adminDelete'])->name('eliminar-llibre');

//RUTES CATEGORIES
Route::get('/categories', [CategoriesController::class, 'adminIndex'])->name('categories');
Route::get('/categories/filtre', [CategoriesController::class, 'adminFiltra'])->name('view-categories-filtrades');
Route::get('/categories/afegir', function () { return view('categories.afegir');})->name('view-afegir-categoria');
Route::post('/categories/afegir', [CategoriesController::class, 'adminStore'])->name('afegir-categoria');
Route::get('/categories/modificar/{id}', [CategoriesController::class, 'adminShow'])->name('view-modificar-categoria');
Route::patch('/categories/modificar/{id}', [CategoriesController::class, 'adminUpdate'])->name('modificar-categoria');
Route::delete('/categories/{id}', [CategoriesController::class, 'adminDelete'])->name('eliminar-categoria');

//RUTES COMANDES
Route::get('/comandes', [ComandesController::class, 'adminIndex'])->name('comandes');
Route::get('/comandes/filtre', [ComandesController::class, 'adminFiltra'])->name('view-comandes-filtrades');
Route::get('/comandes/modificar/{id}', [ComandesController::class, 'adminShow'])->name('view-modificar-comanda');
Route::patch('/comandes/modificar/{id}', [ComandesController::class, 'adminUpdate'])->name('modificar-comanda');

//RUTES USUARIS
Route::get('/usuaris', [UsersController::class, 'adminIndex'])->name('usuaris');
Route::get('/usuaris/filtre', [UsersController::class, 'adminFiltra'])->name('view-usuaris-filtrats');
Route::get('/usuari/afegir',  function () { return view('usuaris.afegir');})->name('view-afegir-usuari');
Route::post('/usuari/afegir', [UsersController::class, 'adminStore'])->name('afegir-usuari');

Route::get('/usuaris/modificar/{id}', [UsersController::class, 'adminShow'])->name('view-modificar-usuari');
Route::patch('/usuaris/modificar/{id}', [UsersController::class, 'adminUpdate'])->name('modificar-usuari');
Route::delete('/usuariDestroy/{id}', [UsersController::class, 'adminDelete'])->name('eliminar-usuari');
