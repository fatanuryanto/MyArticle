<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [ArticleController::class, 'index'])->name('article.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/article/show/{id}',[ArticleController::class, 'show'])->name('article.show');
Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store',[ArticleController::class, 'store'])->name('article.store');
Route::get('/article/edit/{id}',[ArticleController::class, 'edit'])->name('article.edit');
Route::post('/article/update/{id}',[ArticleController::class, 'update'])->name('article.update');
Route::get('/article/delete/{id}',[ArticleController::class, 'destroy'])->name('article.delete');

Route::get('/category/index',[CategoryController::class, 'index'])->name('category.index');
Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
Route::get('/category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/comment/index',[CommentController::class, 'index'])->name('comment.index');
Route::get('/comment/store',[CommentController::class, 'store'])->name('comment.store');
Route::get('/comment/delete/{id}',[CommentController::class, 'destroy'])->name('comment.delete');

route::get('/tag/index',[TagController::class, 'index'])->name('tag.index');
Route::get('/tag/delete/{id}',[TagController::class, 'destroy'])->name('tag.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
