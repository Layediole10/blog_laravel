<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ArticleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

//veriification email
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');


// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');
//---------------------------------------------------------



Route::get('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return view('admin.adminHome');
    });

    Route::prefix('admin')->group(function () {
        Route::resource('articles', ArticleController::class);
        Route::put("articles/{id}/publish", [ArticleController::class, "publish"])->name('articles.publish');
        Route::get('/searchArticle', [ArticleController::class, 'search'])->name('search');
    });
    
    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::put("users/{id}/activate", [UserController::class, "activate"])->name("users.activate");
        Route::get('/searchUser', [UserController::class, 'search'])->name('search');
    });

});

