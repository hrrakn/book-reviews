<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        if ($request != '' || $request != null) {
            $params = $request->validate([
                'post_id' => 'required|exists:posts,id',
                'body' => 'required|max:2000',
            ]);
            $post = Post::findOrFail($params['post_id']);
            $post->comments()->create($params);

            return redirect()->route('posts.show', ['post' => $post]);
        } else {
            $post = '';
            return redirect()->route('posts.show', ['post' => $post]);
        }
    }
}
