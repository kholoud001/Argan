<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentProducts = Product::with('category')->orderBy('created_at', 'desc')->take(6)->get();
        $posts=Blog::with('categories')->orderBy('created_at','desc')->take(3)->get();
        return view('home', compact('recentProducts','posts'));
    }


    public function getProductDetails($id)
    {
        $productModal = Product::findOrFail($id);

        return view('Modal.productModal', compact('productModal'));
    }
}
