<?php

namespace App\Http\Controllers;

use App\Bookstores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $bookstores = Bookstores::with(['category'])->get();
        return view('posts.index', ['bookstores' => $bookstores]);
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

    public function bookstore()
    {
        return view('bookstore');
    }

    public function create()
    {
        $authUser = Auth::user();
        return view('posts.create', ['authUser' => $authUser]);
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'user_id' => 'required',
            'body' => 'required|max:2000',
        ]);

        Post::create($params);

        return redirect()->route('reviews');
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
