<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){

        return view('User.account');
    }

    public function dashboard(Request $request)
    {

        $user = auth()->user();

        return response()->json(['user' => $user]);

    }

    public function getOrderDetails()
    {
        try {
            $orders = Order::with('items')
                ->where('user_id', Auth::id())
                ->get();

            // If no orders found, return an empty array
            if ($orders->isEmpty()) {
                return response()->json([], 200);
            }

            // If orders found, return the necessary details
            $formattedOrders = $orders->map(function ($order) {
                return [
                    'order_number' => $order->id,
                    'status' => $order->status,
                    'price' => $order->items->sum('price'),
                    'created_at' => $order->created_at->format('M d, Y'),

                ];
            });

            return response()->json($formattedOrders, 200);
        } catch (\Exception $e) {
            // If an error occurs, return an error response
            return response()->json(['error' => 'Failed to retrieve order details.'], 500);
        }
    }


    public function getUserInfo(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // You can customize this response to include only the necessary user information
        return response()->json($user);
    }


    public function updateAccountInfo(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'current-pwd' => 'nullable|string|min:8',
            'new-pwd' => 'nullable|string|min:8|confirmed',
            'profile-picture' => 'nullable|image',
        ]);

        // Update the user's account information
        $user = Auth::user();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Update password if provided
        if ($validatedData['new-pwd']) {
            $user->password = Hash::make($validatedData['new-pwd']);
        }

        if ($request->hasFile('profile-picture')) {
            $image = $request->file('profile-picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile-pictures', $imageName);
            $user->picture = $imageName;
        }

        $user->save();

        return response()->json(['message' => 'Account information updated successfully']);
    }



}
