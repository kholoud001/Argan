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
                ->orderBy('created_at', 'desc')
                ->get();

            if ($orders->isEmpty()) {
                return response()->json([], 200);
            }

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
            return response()->json(['error' => 'Failed to retrieve order details.'], 500);
        }
    }


    public function getUserInfo(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }


    public function updateAccountInfo(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'current_pwd' => 'required|string|min:8',
            'new_pwd' => 'nullable|string|min:8|confirmed',
            //'profile-picture' => 'nullable|image',
        ]);

        // Get the authenticated user
        $user = $request->user();

        // Prepare the data for update
        $dataToUpdate = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ];

        if (!empty($validatedData['new-pwd']) && Hash::check($validatedData['current-pwd'], $user->password)) {
            $dataToUpdate['password'] = Hash::make($validatedData['new-pwd']);
        }

        // Update profile picture if provided
        if ($request->hasFile('profile-picture')) {
            $image = $request->file('profile-picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile-pictures', $imageName);
            $dataToUpdate['picture'] = $imageName;
        }

        $user->update($dataToUpdate);

        return response()->json(['message' => 'Account information updated successfully']);
    }



}
