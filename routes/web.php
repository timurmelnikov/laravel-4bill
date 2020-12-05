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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::get('profile',  [App\Http\Controllers\HomeController::class, 'profile'])
    ->middleware('auth')
    ->name('profile');

Route::delete('/user/delete/{id}',  [App\Http\Controllers\UserController::class, 'destroy'])
    ->middleware('auth')
    ->name('user.delete');

Route::patch('/user/restore/{id}',  [App\Http\Controllers\UserController::class, 'restore'])
    ->middleware('auth')
    ->name('user.restore');
