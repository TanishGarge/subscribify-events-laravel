<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\SubscriptionService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private SubscriptionService $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function store(Request $request) {

        $user = auth()->user();
        // $plan = Plan::where('id', $request->planId)->first();

        // $subscription = $this->subscriptionService->subscribe($user, $plan);

        if($user->hasSubscription()) {
            $subscription = $user->subscription;
            $subscription->plan_id = $request->planId;
            $subscription->status = 'active';
            $subscription->started_at = Carbon::now();
            $subscription->cancelled_at = null;
            $subscription->save();
        } else {

            Subscription::create([
                'user_id' => $user->id,
                'plan_id' => $request->planId,
            ]);
        }


        return redirect()->route('dashboard')->with('success', 'You have Successfully Subscribed');
    }

    public function update(Subscription $subscription) {
        // dd($subscription);
        // $user = User::where('id', $subscription->user_id)
        $subscription->status = 'cancelled';
        $subscription->cancelled_at = Carbon::now();
        $subscription->save();
        return redirect()->route('dashboard')->with('success', 'You have Successfully Subscribed');

    }
}
