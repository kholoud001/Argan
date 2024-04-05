<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function show(){

        $posts = Blog::orderByDesc('created_at')->paginate(6);;
        $archivedPosts = Blog::onlyTrashed()->get();

        $categories= Category::all();
        return view('Admin.blogs',compact('posts','categories','archivedPosts'));
    }



    public function store(Request $request)
    {
       // dd($request);
        // Validate the form data
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'image' => 'required|image|max:2048',
        ]);

// Check if validation fails
        if ($validator->fails()) {
            dd($validator->errors());
        }

// If validation passes, retrieve validated data
        $validatedData = $validator->validated();

        // Create a new post instance
        $post = new Blog();
        $post->title = $validatedData['name'];
        $post->content = $validatedData['content'];


        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->picture = $imagePath;
        }

        // Save the post
        $post->save();

        // Attach categories to the post
        foreach ($validatedData['category_ids'] as $categoryId) {
            $post->categories()->attach($categoryId);
        }

        // Redirect back or to a specific route
        return redirect()->route('posts.show')->with('success', 'Post created successfully!');
    }


    public function destroy($id)
    {
        $post = Blog::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.show')->with('success', 'Post deleted successfully.');
    }


    public function restore($id)
    {
        $post = Blog::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->route('posts.show')->with('success', 'Post restored successfully.');
    }

}
