<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'featured_image' => ['required', 'image']
        ]);

        $attributes['user_id'] = auth()->user()->id;
        $attributes['featured_image'] = request()->file('featured_image')->store('featured_images');

        Post::create($attributes);

        return back()->with('success', "Post '{$attributes['title']}' sucessfully created.");
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post, 'categories' => Category::all()]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'featured_image' => 'image'
        ]);

        if (isset($attributes['featured_image'])) {
            $attributes['featured_image'] = request()->file('featured_image')->store('featured_images');
        }

        $post->update($attributes);

        return redirect()
            ->route('admin-dashboard')
            ->with('success', "Post '{$attributes['title']}' sucessfully updated.");
    }

    public function publish(Post $post)
    {
        if (isset($post->published_at)) {
            throw ValidationException::withMessages(['published_at' => 'Post already published']);
        }

        $post->update([
            'published_at' => now()
        ]);

        return redirect()
            ->route('admin-dashboard')
            ->with('success', "Post '{$post->title}' has been published successfully.");
    }

    public function unpublish(Post $post)
    {
        if (!isset($post->published_at)) {
            throw ValidationException::withMessages(['published_at' => 'Post is not published']);
        }

        $post->update([
            'published_at' => null
        ]);

        return redirect()
            ->route('admin-dashboard')
            ->with('success', "Post '{$post->title}' has been unpublished successfully.");
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', "Post '{$post->title}' sucessfully deleted.");
    }
}
