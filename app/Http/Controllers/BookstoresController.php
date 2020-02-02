<?php

namespace App\Http\Controllers;

use App\Bookstore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class BookstoresController extends Controller
{
    public function index()
    {
        $bookstores = Bookstore::with(['category'])->get();
        $params = [
            'bookstores' => $bookstores,
        ];

        return view('posts.index', $params);
    }

    public function bookstore($id)
    {
        $bookstore = Bookstore::where('name', $id)->firstOrFail();
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(5);
        $authUser = Auth::user();
        $item = Post::with('user')->get();

        $params = [
            'bookstore' => $bookstore,
            'posts' => $posts,
            'authUser' => $authUser,
            'items' => $item,
        ];
        return view('bookstores', $params);
    }
}
