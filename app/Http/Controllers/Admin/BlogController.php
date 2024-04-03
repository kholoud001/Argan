<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show(){

        $posts = Blog::orderByDesc('created_at')->get();
        $categories= Category::all();
        return view('Admin.blogs',compact('posts','categories'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the post in the database
        $post = new Blog();
        $post->title = $validatedData['name'];
        $post->category_id = $validatedData['category_id'];
        $post->content = $validatedData['content'];

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->picture = $imagePath;
        }

        $post->save();

        // Redirect back or to a specific route
        return redirect()->route('posts.show')->with('success', 'Post created successfully!');
    }
}
