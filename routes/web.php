<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


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
Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])
    ->middleware(['auth'])
    ->name('create');

Route::get('/posts/{post:slug}/edit', [\App\Http\Controllers\PostController::class, 'edit'])
    ->middleware(['auth'])
    ->name('edit');

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

Route::get('/posts/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])
    ->name('show');

Route::get('/dashboard', function () {
    $posts = Post::where('user_id', Auth::id())->get();

    return view('dashboard', compact('posts'));
})
    ->middleware(['auth'])
    ->name('dashboard');

Route::post('/posts/create', [\App\Http\Controllers\PostController::class, 'store'])
    ->middleware('auth')
    ->name('store');

Route::put('/posts/{post:slug}/edit', [\App\Http\Controllers\PostController::class, 'update'])
    ->name('update');

Route::delete('/posts/{post:slug}/delete', [\App\Http\Controllers\PostController::class, 'destroy'])->name('delete');

require __DIR__.'/auth.php';
