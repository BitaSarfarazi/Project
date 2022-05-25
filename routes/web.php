<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\ShowController;
use \App\Http\Controllers\CreateController;
use \App\Http\Controllers\EditController;
use \App\Http\Controllers\DestroyController;
use \App\Http\Controllers\ForumController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\DocController;
use App\Http\Controllers\LocalizationController;

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
})->name('home');


Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');
Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.try');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/show/{show}', [ShowController::class, 'show'])->name('show');
Route::get('/index/create/post', [CreateController::class, 'create'])->name('index.create');
Route::post('/index/create/post', [CreateController::class, 'store'])->name('index.store');
Route::get('/show/{index}/edit', [EditController::class, 'edit'])->name('index.edit');
Route::put('/show/{index}/edit', [EditController::class, 'update']);
Route::delete('show/{index}', [DestroyController::class, 'destroy'])->name('user.delete');
Route::get('/forum', [ForumController::class, 'index'])->name('forum');
Route::get('/forum/{forum}', [ForumController::class, 'show'])->name('forum.show');
Route::get('/forum/create/post', [ForumController::class, 'create'])->name('forum.create');
Route::post('/forum/create/post', [ForumController::class, 'store'])->name('forum.store');
Route::get('/forum/{index}/edit', [ForumController::class, 'edit'])->name('forum.edit');
Route::put('/forum/{index}/edit', [ForumController::class, 'update'])->name('forum.update');
Route::delete('forum/{index}', [ForumController::class, 'destroy'])->name('forum.delete');
Route::get('forum-queries', [ForumController::class, 'queries']);
// Répertoire de documents
Route::get('/doc', [DocController::class, 'index'])->name('documents');
Route::get('/doc/{id}', [DocController::class, 'show'])->name('doc.show');
Route::get('/doc/create/post', [DocController::class, 'create'])->name('doc.create');
Route::post('/doc/create/post', [DocController::class, 'store'])->name('doc.store');
Route::get('/doc/{id}/edit', [DocController::class, 'edit'])->name('doc.edit');
Route::put('/doc/{id}/edit', [DocController::class, 'update'])->name('doc.update');
Route::delete('doc/{id}', [DocController::class, 'destroy'])->name('doc.delete');






