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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, retrieve validated data
        $validatedData = $validator->validated();

        // Create a new post instance
        $post = new Blog();
        $post->title = $validatedData['name'];
        $post->content = $validatedData['content'];

        // Upload image if provided
        if ($image = $request->file('image')) {
            $save_url = $this->handleImage($image);
            $post->picture = $save_url;
        }

        // Save the post
        $post->save();

        // Attach categories to the post
        $post->categories()->attach($validatedData['category_ids']);

        // Redirect back or to a specific route
        return redirect()->route('posts.show')->with('success', 'Post created successfully!');
    }



    protected function handleImage($image){
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'assets/images/post/' . $name_gen; // Corrected the directory path
        $image->move(public_path('assets/images/post'), $name_gen);
        return $save_url;
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
