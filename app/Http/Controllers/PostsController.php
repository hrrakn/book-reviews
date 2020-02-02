<?php

namespace App\Http\Controllers;

use App\Post;
use App\Bookstore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function reviews($id)
    {
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);
        $bookstore = Bookstore::where('id', $id)->firstOrFail();
        $authUser = Auth::user();
        $item = Post::with('user')->get();

        $params = [
            'posts' => $posts,
            'authUser' => $authUser,
            'bookstore' => $bookstore,
            'items' => $item,
        ];
        return view('reviews', $params);
    }

    public function create($id)
    {
        $authUser = Auth::user();
        $bookstore = Bookstore::where('id', $id)->firstOrFail();
        $params = [
            'authUser' => $authUser,
            'bookstore' => $bookstore,
        ];
        return view('posts.create', $params);
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

    public function show($id, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $bookstore = Bookstore::where('id', $id)->firstOrFail();
        $authUser = Auth::user();
        $params = [
            'post' => $post,
            'bookstore' => $bookstore,
            'authUser' => $authUser,
        ];
        return view('posts.show', $params);
    }

    public function edit($id, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $bookstore = Bookstore::where('id', $id)->firstOrFail();
        return view('posts.edit', [
            'post' => $post,
            'bookstore' => $bookstore,
        ]);
    }

    public function update($id, $post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($post_id);
        $bookstore = Bookstore::where('id', $id)->firstOrFail();
        $post->fill($params)->save();
        return redirect()->route('posts.show', [
            'post' => $post,
            'bookstore' => $bookstore,
        ]);
    }

    public function destroy($id, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $bookstore = Bookstore::where('id', $id)->firstOrFail();
        DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('bookstore', [
            'post' => $post,
            'bookstore' => $bookstore,
        ]);
    }
}
