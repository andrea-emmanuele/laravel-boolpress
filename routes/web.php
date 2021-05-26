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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

Route::get('/post/{post}', [\App\Http\Controllers\PostController::class, 'show']);

Route::get('/dashboard', function () {
    $posts = Post::where('user_id', Auth::id())->get();

    return view('dashboard', compact('posts'));
})->middleware(['auth'])->name('dashboard');

Route::post('/posts/create', [\App\Http\Controllers\PostController::class, 'store'])
    ->middleware('auth')->name('dashboard');

Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])
    ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
