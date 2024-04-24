<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TrackController extends Controller
{

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


    ////////////////////////  Dashboard
    ///
    public function countUser(){

        $usersCount= User::all()->count();
        $productsCount =Product::all()->count();


        return view('Admin.index',compact('usersCount','productsCount'));

    }


}
