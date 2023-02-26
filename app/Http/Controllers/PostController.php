<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::with(['author', 'category'])
                ->latest()
                ->filter(request(['search', 'category', 'author']))
                ->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post->with(['author', 'category'])->first()
        ]);
    }

    public function getPosts()
    {
        $posts = Post::with(['author', 'category'])->latest();

        if (request('search')) {
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return $posts->get();
    }
}
