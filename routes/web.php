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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::namespace('Admin')->group(function() {
    Route::get('/login', [App\Http\Controllers\AdminUserController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/login', [App\Http\Controllers\AdminUserController::class, 'login'])->name('admin.login');
});