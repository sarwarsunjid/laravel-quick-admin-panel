<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\LoginController;
//use App\Http\Controllers\Admin\HomeController;

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


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');

    Route::post('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.login');
});