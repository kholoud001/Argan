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

        if ($request->has('parent_comment_id')) {
            $parentComment = Comment::find($request->parent_comment_id);
            if (!$parentComment) {
                return response()->json(['error' => 'Parent comment not found'], 404);
            }
            $comment->parent_comment_id = $parentComment->id;
        }

        $comment->save();

        return response()->json(['message' => 'Comment added successfully'], 201);
    }


    public function getComments($blogPostId)
    {
        $blogPost = Blog::findOrFail($blogPostId);

        $comments = $blogPost->comments()->with('user')->orderBy('created_at', 'desc')->take(10)->get();

        $commentIds = $comments->pluck('id');
        $replies = Comment::whereIn('parent_comment_id', $commentIds)->with('user')->orderBy('created_at', 'desc')->get()->groupBy('parent_comment_id');

        return response()->json(['comments' => $comments, 'replies' => $replies], 200);
    }



}
