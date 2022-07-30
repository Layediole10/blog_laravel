<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ArticleController;

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





Route::get('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return view('admin.adminHome');
    });

    Route::prefix('admin')->group(function () {
        Route::resource('articles', ArticleController::class);
    });
    
    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class);
    });

});

