<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/home', function () {
    return view('home');
});

Route::view('/', 'welcome');


//Route::get('/post/{id}/{welcome?}', [PostController::class, 'show']);

Route::get('/post/', [PostController::class, 'index'])->name('post.index')->middleware('auth');

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::get('/post/{id}/', [PostController::class, 'show'])->name('post.show');

Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Auth::routes([
    //'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/loginWorker', 'auth.loginWorker');
