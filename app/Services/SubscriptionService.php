<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;

class SubscriptionService {

    public function subscribe(User $user, Plan $plan) {

        // Cancel any existing active subscription
        // $this->cancelActiveSubscription($user);

        // Create new subscription
        Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id
        ]);


    }

    /**
     * Cancel user's active subscription
     */
    public function cancelActiveSubscription(User $user): bool
    {
        if(!$user->hasSubscription())
                return false;


        $activeSubscription = $user->subscription();

        if (!$activeSubscription) {
            return false;
        }

        $activeSubscription->update([
            'status' => 'cancelled',
            'ends_at' => Carbon::now()
        ]);

        return true;
    }

    /**
     * Check if user has an active subscription
     */
    public function hasActiveSubscription(User $user): bool
    {
        return $user->subscription !== null;
    }

    /**
     * Get user's active subscription
     */
    public function getActiveSubscription(User $user): ?Subscription
    {
        return $user->activeSubscription;
    }

        /**
     * Get user's current plan
     */
    public function getCurrentPlan(User $user): ?Plan
    {
        $activeSubscription = $this->getActiveSubscription($user);

        return $activeSubscription ? $activeSubscription->plan : null;
    }

    /**
     * Check if user can access subscriber benefits
     */
    public function canAccessSubscriberBenefits(User $user): bool
    {
        $subscription = $this->getActiveSubscription($user);

        if (!$subscription) {
            return false;
        }

        // Check if subscription is still active and not expired
        if ($subscription->status !== 'active') {
            return false;
        }

        // Check if subscription has an end date and hasn't expired
        if ($subscription->ends_at && $subscription->ends_at->isPast()) {
            return false;
        }

        return true;
    }

    /**
     * Get member discount percentage for user
     */
    public function getMemberDiscountPercent(User $user): int
    {
        if (!$this->canAccessSubscriberBenefits($user)) {
            return 0;
        }

        $plan = $this->getCurrentPlan($user);

        return $plan ? $plan->member_discount_percent : 0;
    }

    /**
     * Get early access hours for user
     */
    public function getEarlyAccessHours(User $user): int
    {
        if (!$this->canAccessSubscriberBenefits($user)) {
            return 0;
        }

        $plan = $this->getCurrentPlan($user);

        return $plan ? $plan->early_access_hours : 0;
    }

    /**
     * Switch user to a different plan
     */
    // public function switchPlan(User $user, Plan $newPlan): Subscription
    // {
    //     $currentSubscription = $this->getActiveSubscription($user);

    //     if (!$currentSubscription) {
    //         throw new InvalidArgumentException('User does not have an active subscription to switch from.');
    //     }

    //     if ($currentSubscription->plan_id === $newPlan->id) {
    //         throw new InvalidArgumentException('User is already subscribed to this plan.');
    //     }

    //     // Cancel current subscription
    //     $this->cancelActiveSubscription($user);

    //     // Create new subscription with new plan
    //     return $this->subscribe($user, $newPlan);
    // }

     /**
     * Reactivate a cancelled subscription
     */
    // public function reactivateSubscription(User $user, Plan $plan): Subscription
    // {
    //     // Cancel any existing active subscription first
    //     $this->cancelActiveSubscription($user);

    //     // Create new active subscription
    //     return $this->subscribe($user, $plan);
    // }

    /**
     * Get subscription history for user
     */
    public function getSubscriptionHistory(User $user): \Illuminate\Database\Eloquent\Collection
    {
        return $user->subscriptions()
                    ->with('plan')
                    ->orderBy('created_at', 'desc')
                    ->get();
    }

    /**
     * Check if user is eligible for early access to an event
     */
    public function isEligibleForEarlyAccess(User $user): bool
    {
        return $this->canAccessSubscriberBenefits($user) && $this->getEarlyAccessHours($user) > 0;
    }

}
