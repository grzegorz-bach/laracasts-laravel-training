<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'categories' => Category::all(),
        'authors' => User::all(),
        'category' => $category,
        'author' => null
    ]);
});

Route::get('/authors/{author:id}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all(),
        'authors' => User::all(),
        'category' => null,
        'author' => $author,
    ]);
});
