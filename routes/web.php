<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;

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

Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('remove{id}', [PostController::class, 'remove'])->name('post.remove');
    Route::get('add', [PostController::class, 'addForm'])->name('post.add');
    Route::post('add', [PostController::class, 'saveAdd']);
    Route::get('edit/{id}', [PostController::class, 'editForm'])->name('post.edit');
    Route::post('edit/{id}', [PostController::class, 'saveEdit']);
    Route::get('add/{id}', [PostController::class, 'addExistForm'])->name('post.addexist');
    Route::post('add/{id}', [PostController::class, 'saveAdd']);
});
