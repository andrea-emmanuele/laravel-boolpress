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
Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');

/*posts */
Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])
    ->middleware(['auth'])
    ->name('create');

Route::get('/posts/{post:slug}/edit', [\App\Http\Controllers\PostController::class, 'edit'])
    ->middleware(['auth'])
    ->name('edit');

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

/* categories */
Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])
    ->middleware('auth')
    ->name('addCategory');

Route::delete('/categories/{category:slug}/delete', [\App\Http\Controllers\CategoryController::class, 'destroy'])
    ->middleware('auth')
    ->name('deleteCategory');

Route::put('/categories/{category:slug}/edit', [\App\Http\Controllers\CategoryController::class, 'update'])
    ->middleware('auth')
    ->name('updateCategory');

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])
    ->middleware('auth')
    ->name('allCategories');

Route::get('/categories/{category:slug}', [\App\Http\Controllers\CategoryController::class, 'show'])
    ->name('showCategory');

Route::get('/categories/{category:slug}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])
    ->middleware('auth')
    ->name('editCategory');

Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store'])
    ->middleware('auth')
    ->name('storeCategory');

require __DIR__.'/auth.php';
