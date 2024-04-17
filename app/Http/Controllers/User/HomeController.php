<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Review;
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
        $productDetails = Product::with('category')->findOrFail($id);
        $latestProducts = Product::with('category')->orderBy('created_at', 'desc')->take(3)->get();
        $reviews = Review::with('user')->latest()->limit(10)->get();


        return view('DetailPages.product_detail', [
            'productDetails' => $productDetails,
            'latestProducts' => $latestProducts,
            'productId' => $id,
            'reviews' => $reviews,
        ]);
    }

    public function getBlogDetails($id){

        $blogDetails = Blog::with('categories')->findOrFail($id);
        $posts=Blog::with('categories')->orderBy('created_at','desc')->take(3)->get();


        return view('DetailPages.blog_detail', compact('blogDetails','posts'));
    }



}
