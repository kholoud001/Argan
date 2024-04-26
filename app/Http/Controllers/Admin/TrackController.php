<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TrackController extends Controller
{

    ////////////////////////////////         Orders
    ///
    ///
    public function index()
    {
        $orders = Order::with('items')
            ->whereNull('deleted_at')
            ->orderByDesc('created_at')
            ->paginate(6);

        $archivedOrders = Order::with('items')
            ->onlyTrashed()
            ->orderByDesc('deleted_at')
            ->paginate(6);

        return view('Admin.orders', compact('orders', 'archivedOrders'));
    }

    public function approve($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'approved']);

        return Redirect::route('orders.show');

    }


    public function archive($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return Redirect::route('orders.show');

    }


    ////////////////////////////////////         Dashboard
    ///
    ///
    public function countUser(){

        $usersCount= User::count();
        $productsCount =Product::count();
        $ordersCount = Order::count();
        $topProduct = Product::orderBy('sales_count', 'desc')->first()->name;

        //get pending Order
        $pendingOrders = Order::where('status', 'pending')
            ->whereNull('deleted_at')
            ->paginate(4);


        $productsWithSalesCount = Product::all();

        //  data for Chart.js
        $labels = $productsWithSalesCount->pluck('name')->toArray();
        $salesCounts = $productsWithSalesCount->pluck('sales_count')->toArray();


        return view('Admin.index',compact('usersCount','productsCount',
            'pendingOrders','topProduct','ordersCount','labels','salesCounts'));

    }


    //////////////////////////////////////       Comments
    ///
    public function commentsControl(){
        $comments = Comment::with('user','blog')->paginate(8);
        $users = User::all();
        $blogs= Blog::all();

        return view('Admin.comments',compact('comments','users','blogs'));
    }

    public function deleteComments($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');

    }


}
