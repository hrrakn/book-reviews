<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function reviews()
    {
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);
        $authUser = Auth::user();
        $item = Post::with('user')->get();

        $params = [
            'authUser' => $authUser,
            'items' => $item,
            'posts' => $posts,
        ];
        return view('reviews', $params);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        Post::create($params);

        return redirect()->route('posts.index');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        $authUser = Auth::user();
        $params = [
            'authUser' => $authUser,
            'post' => $post,
        ];
        return view('posts.show', $params);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('posts.index');
    }
}
