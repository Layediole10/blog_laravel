<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\ArticleController as ControllersArticleController;
use App\Http\Controllers\CommentController as ControllersCommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\LikeController;
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

//HOME USER
Route::get('/',  [ControllersArticleController::class, 'index'])->name('home');

//CONNECTION
Route::get('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth', 'admin'])->group(function(){

    //ADMIN
    Route::get('/admin', function () {
        return view('admin.adminHome');
    })->name('dashbord');


    //ARTICLES
    Route::prefix('admin')->group(function () {
        Route::resource('articles', ArticleController::class);
        Route::put("articles/{id}/publish", [ArticleController::class, "publish"])->name('articles.publish');
        Route::get('/searchArticle', [ArticleController::class, 'search'])->name('articles.search');

        //USERS
        Route::resource('users', UserController::class);
        Route::put("users/{id}/activate", [UserController::class, "activate"])->name("users.activate");
        Route::get('/searchUser', [UserController::class, 'search'])->name('users.search');
  
        
    });
    
});

//SHOW ARTIICLE
Route::get('admin/{id}/show',  [ControllersArticleController::class, 'show'])->name('show');

//COMMENTS
Route::get('/admin/comments', [ControllersCommentController::class, 'index'])->name('comments.index');
Route::post('/admin/articles/{id}/comments', [ControllersCommentController::class, 'store'])->name('comments.store');


//LIKES
Route::post('/admin/articles/likes', [ControllersArticleController::class, 'liker'])->name('articles.like');

