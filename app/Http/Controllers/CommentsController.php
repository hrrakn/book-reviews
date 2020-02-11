<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Bookstore;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ]);
        $post = Post::findOrFail($params['post_id']);
        $bookstore = Bookstore::findOrFail($post->bookstore_id);
        $post->comments()->create($params);

        return redirect()->route('bookstore', [
            'bookstore' => $bookstore->name
        ]);
    }
}
