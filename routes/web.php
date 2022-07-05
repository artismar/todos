<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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
    return view('index');
})->name('index');

Route::get('/todos', function () {
    return view('todos.index');
})->name('todos');

// Mostramos todas las tareas
Route::get('/todos', [TodoController::class, 'index'])->name('todos');

// post para enviar datos. parametro 2, enviamos un arreglo del nombre de la clase y el nombre del metodo.
Route::post('/todos', [TodoController::class, 'store'])->name('todos');

// Mostramos el elemento con el id.
Route::get('/todos/{id}', [TodoController::class, 'show'])->name('todos-show');

// Actualizamos.
Route::patch('/todos/{id}', [TodoController::class, 'update'])->name('todos-update');

// Eliminamos.
Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos-destroy');

// .
Route::resource('categories', CategoriesController::class);