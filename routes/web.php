<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\FirstTaskController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\GoalController;

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

Route::post('post/{task}/bookmarks',[BookmarkController::class, 'store'])->name('bookmark');//ブックマークをする

Route::delete('post/{task}/unbookmarks',[BookmarkController::class, 'destroy'])->name('unbookmark');

//メモが作成できるようにcreateアクション
Route::get('/notes/create/{task_id}', [NoteController::class, 'create']) -> name('notes.create');

//メモが保存できるようにstoreアクション
Route::post('/notes', [NoteController::class, 'store']) -> name('notes.store');

// Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');

Route::delete('post/{task}/unbookmarks',[BookmarkController::class, 'destroy'])->name('unbookmark');//ブックマークを外す

Route::get('/goals',[GoalController::class, 'index'])->name('goals.index');//今後はマイページに飛ぶようになる

Route::get('/goals/create',[GoalController::class, 'create'])->name('goals.create');//目標作成

Route::post('/goals',[GoalController::class, 'store'])->name('goals.store');//目標保存

Route::get('/goals/{id}/edit',[GoalController::class, 'edit'])->name('goals.edit');//目標編集

Route::get('/first/create',[FirstTaskController::class, 'create'])->name('first.create');//最初の投稿

