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

Route::patch('/user/block/{id}',  [App\Http\Controllers\UserController::class, 'block'])
    ->middleware('auth')
    ->name('user.block');

Route::patch('/user/unblock/{id}',  [App\Http\Controllers\UserController::class, 'unblock'])
    ->middleware('auth')
    ->name('user.unblock');
