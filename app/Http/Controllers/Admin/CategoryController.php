<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show(){

        $categories= Category::orderByDesc('created_at')->paginate(8);

        return view('Admin.categories',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.show')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($validatedData);

        return redirect()->route('categories.show', $category->id)->with('success', 'Category updated successfully.');
    }




    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.show')->with('success', 'Category deleted successfully.');
    }
}
