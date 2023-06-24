<?php

namespace App\Models\UserSubscriptionPlan\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UserSubscriptionPlanRelationship
{
    /**
     * Get the user associated with the subscription plan.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(config('model-variables.models.user.class'), 'user_uuid');
    }

    /**
     * Get the subscription plan associated with the user subscription plan.
     *
     * @return BelongsTo
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(config('model-variables.models.subscription_plans.class'), 'plan_uuid');
    }
}