<?php

namespace App\Http\Controllers;

use App\Post;
use App\Bookstore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function reviews()
    {
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);
        $bookstore = Bookstore::get();
        $authUser = Auth::user();

        $params = [
            'posts' => $posts,
            'authUser' => $authUser,
            'bookstore' => $bookstore,
        ];
        return view('posts.reviews', $params);
    }

    public function create()
    {
        $bookstore = Bookstore::findOrFail($_GET['bookstore_id']);
        $authUser = Auth::user();
        return view('posts.create', [
            'bookstore_id' => $bookstore->id,
            'user_id' => $authUser->id
        ]);
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'user_id' => 'required',
            'body' => 'required|max:2000',
            'bookstore_id' => 'required|exists:bookstores,id'
        ]);
        $bookstore = Bookstore::findOrFail($params['bookstore_id']);
        Post::create($params);

        return redirect()->route('bookstore', ['bookstore' => $bookstore->name]);
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        $bookstore = Bookstore::findOrFail($post->bookstore_id);
        $authUser = Auth::user();
        $params = [
            'post' => $post,
            'bookstore' => $bookstore,
            'authUser' => $authUser,
        ];
        return view('posts.show', $params);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        $authUser = Auth::user();
        return view('posts.edit', [
            'post' => $post,
            'bookstore_id' => $post->bookstore_id,
            'user_id' => $authUser->id,
        ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'user_id' => 'required',
            'body' => 'required|max:2000',
            'bookstore_id' => 'required|exists:bookstores,id'
        ]);
        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();
        $bookstore = Bookstore::findOrFail($params['bookstore_id']);
        $authUser = Auth::user();
        return redirect()->route('posts.show', [
            'post' => $post,
            'bookstore' => $bookstore,
            'authUser' => $authUser,
        ]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
        $bookstore = Bookstore::findOrFail($post->bookstore_id);
        DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('bookstore', ['bookstore' => $bookstore->name]);
    }
}
