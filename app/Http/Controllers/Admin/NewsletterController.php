<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SubscriptionConfirmation;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        $subscription = Subscription::create([
            'email' => $request->email,
        ]);

        $this->sendConfirmationEmail($subscription);

        return redirect()->back()->with('success', 'You have been subscribed to our newsletter. Please check your email for confirmation.');
    }

    protected function sendConfirmationEmail($subscription)
    {
        Mail::to($subscription->email)->send(new SubscriptionConfirmation());
    }
}
