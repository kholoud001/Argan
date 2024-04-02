<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(){

        $products = Product::orderByDesc('created_at')->paginate(8);
        $categories= Category::all();
        return view('Admin.products',compact('products','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], ['image.required' => 'The image field is required.']);

        // Upload image if provided
        $imagePath = $request->file('image')->store('products');

        Product::create(array_merge(
            $request->only(['name', 'description', 'price', 'quantity', 'category_id']),
            ['image' => $imagePath]
        ));

        return redirect()->route('products.show')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric|min:0',
            'quantity' => 'sometimes|integer|min:0',
            'category_id' => 'sometimes|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Filter out null values from the validated data
        $validatedData = array_filter($validatedData, function ($value) {
            return $value !== null;
        });

        // Upload image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products');
            $validatedData['image'] = $imagePath;
        }

        $product->update($validatedData);

        return redirect()->route('products.show')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
