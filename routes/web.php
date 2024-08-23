<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookmarkController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts',[TaskController::class, 'index'])->name('posts.index');//一覧表示

Route::get('/posts/create',[TaskController::class, 'create'])->name('posts.create');//新規投稿

Route::post('/posts',[TaskController::class, 'store'])->name('posts.store');//新規投稿画面

Route::get('/posts/{id}',[TaskController::class, 'show'])->name('posts.show');//詳細画面

Route::get('/posts/{id}/edit',[TaskController::class, 'edit'])->name('posts.edit');//編集更新画面

Route::put('/posts/{id}',[TaskController::class, 'update'])->name('posts.update');//更新処理

Route::delete('/posts/{id}',[TaskController::class, 'destroy'])->name('posts.destroy');//削除

Route::post('post/{task}/bookmarks',[BookmarkController::class, 'store'])->name('bookmark');

Route::delete('post/{task}/unbookmarks',[BookmarkController::class, 'destroy'])->name('unbookmark');
