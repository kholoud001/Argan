<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $blogPostId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $user = $request->user();

        $comment = new Comment([
            'user_id' => $user->id,
            'blog_post_id' => $blogPostId,
            'content' => $request->content,
        ]);

        $comment->save();

        return response()->json(['message' => 'Comment added successfully'], 201);
    }


    public function getComments($blogPostId)
    {
        $blogPost = Blog::findOrFail($blogPostId);

        $comments = $blogPost->comments()->with('user')->get();

        return response()->json(['comments' => $comments], 200);
    }
}
