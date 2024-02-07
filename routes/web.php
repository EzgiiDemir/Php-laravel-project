<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\editcontroller;
use App\Http\Controllers\showcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post', [App\Http\Controllers\postcontroller::class, 'index'])->name('post');
Route::get('/profile', [App\Http\Controllers\profilecontroller::class, 'index'])->name('profile');
Route::post('/edit', [App\Http\Controllers\profilecontroller::class, 'update'])->name('edit');
Route::get('/update_profile', [App\Http\Controllers\profilecontroller::class, 'form'])->name('update_profile');
Route::get('/create-post', [App\Http\Controllers\postcontroller::class, 'create'])->name('create.post');
Route::post('/insert.post', [App\Http\Controllers\postcontroller::class, 'insert'])->name('insert.post');
Route::get('/show/{id}', [App\Http\Controllers\postcontroller::class, 'show'])->name('show.post');
Route::put('/update', [App\Http\Controllers\postcontroller::class, 'update'])->name('update.post');
Route::delete('/delete/{id}', [App\Http\Controllers\postcontroller::class, 'delete'])->name('delete.post');