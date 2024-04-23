<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(){

        $products = Product::orderByDesc('created_at')->paginate(8);
        $trashedProducts = Product::onlyTrashed()->get();

        $categories= Category::all();
        return view('Admin.products',compact('products','categories','trashedProducts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image',
        ]);

        // Upload image if provided
       if($image = $request->file('image')){
           $save_url = $this->handleImage($request->file('image'));
       }

       Product::create([
           'name' => $request->name,
           'description' => $request->description,
           'price' => $request->price,
           'quantity'=>$request->quantity,
           'image' => $save_url,
           'category_id' => $request->category_id,
       ]);

        return redirect()->route('products.show')->with('success', 'Product created successfully.');
    }



    public function update(Request $request, Product $product)
    {
        // Update the product with the request data
        $product->update($request->all());

        if ($request->hasFile('image')) {
            // Handle image upload and get the image path
            $imagePath = $this->handleImage($request->file('image'));

            $product->image = $imagePath;
            $product->save();
        }

        return redirect()->route('products.show', $product->id)->with('success', 'Product updated successfully.');
    }

    protected function handleImage($image){
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images/product'), $name_gen); // Save the image to the public directory
        $imagePath = 'assets/images/product/' . $name_gen; // Image path relative to the public directory
        return $imagePath;
    }




    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function restore($id)
    {
        $post = Product::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->route('products.show')->with('success', 'Post restored successfully.');
    }

}
