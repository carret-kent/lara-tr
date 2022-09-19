<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('tasks/create', [\App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('tasks', [\App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get('tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::patch('tasks/{task}/complete', [\App\Http\Controllers\TaskController::class, 'complete'])->name('tasks.complete');
Route::patch('tasks/{task}/yet_complete', [\App\Http\Controllers\TaskController::class, 'yetComplete'])->name('tasks.yet_complete');
Route::get('tasks/{task}', [\App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');
Route::get('tasks/{task}/edit', [\App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
Route::put('tasks/{task}', [\App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
