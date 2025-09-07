<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index() {

        $user = auth()->user();
        $plans = Plan::all();

        if($user->hasActiveSubscription()) {
            $subscription = $user->subscription;
            $subscriptionId = $subscription->id;
            $plan = $subscription->plan;
            return view('subscribed-plan', compact('subscriptionId', 'plan'));
        }

        return view('plan', compact('plans'));
    }
}
