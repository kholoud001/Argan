<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    /////////////////////////////////////   home page
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
        $reviews = Review::with('user')
            ->where('product_id', $id)
            ->latest()
            ->take(10)
            ->get();

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

    ////////////////////////////////////  Contact page

    public function contactview(){
        return view('contact');
    }

    public function contact(Request $request)
    {
        // Validate the form data
        $request->validate([
            'con_name' => 'required',
            'con_email' => 'required|email',
            'con_message' => 'required',
        ]);

        Mail::send([], [], function ($message) use ($request) {
            $message->to(config('mail.from.address'))
                ->subject('New Contact Message')
                ->html('Name: ' . $request->con_name . '<br>Email: ' . $request->con_email . '<br>Message: ' . $request->con_message);
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }


    /////////////////////////   Product catalogue page
    ///
    public function ProductCatalogue()
    {
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $categories = Category::all();

        return $this->returnView(compact('products', 'categories'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search_query');

        $products = Product::where('name', 'like', '%' . $searchQuery . '%')->paginate(9);

        return response()->json([
            'products' => $products,
            'searchQuery' => $searchQuery
        ]);
    }

    public function sort1(Request $request)
    {
        $sortBy = $request->input('sort_by');

        // Set a default sorting field and direction if $sortBy is empty or null
        if (empty($sortBy)) {
            $sortBy = 'created_at';
            $sortDirection = 'desc';
        }

        // Query products based on the selected sorting field
        switch ($sortBy) {
            case 'best_selling':
                // Sort products by sales count (best selling)
                $products = Product::orderBy('sales_count', 'desc')->paginate(9);
                break;
            case 'price_low_high':
                // Sort products by price low to high
                $products = Product::orderBy('price', 'asc')->paginate(9);
                break;
            case 'price_high_low':
                // Sort products by price high to low
                $products = Product::orderBy('price', 'desc')->paginate(9);
                break;
            case 'date_old_new':
                // Sort products by date old to new
                $products = Product::orderBy('created_at', 'asc')->paginate(9);
                break;
            case 'date_new_old':
                // Sort products by date new to old
                $products = Product::orderBy('created_at', 'desc')->paginate(9);
                break;
            case 'alphabetically_asc':
                // Sort products alphabetically A-Z
                $products = Product::orderBy('name', 'asc')->paginate(9);
                break;
            case 'alphabetically_desc':
                // Sort products alphabetically Z-A
                $products = Product::orderBy('name', 'desc')->paginate(9);
                break;
            default:
                // Default sorting logic
                $products = Product::paginate(9);
                break;
        }

        // Return the sorted products and categories to the view
        return $this->returnView(compact('products'));
    }

    private function returnView($data)
    {
        $categories = Category::all();
        return view('User.product', array_merge($data, compact('categories')));
    }



}
