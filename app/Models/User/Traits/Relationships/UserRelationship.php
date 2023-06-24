<?php

namespace App\Models\User\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UserRelationship
{
    /**
     * Get the subscription plan associated with the user.
     *
     * @return BelongsTo
     */
    public function subscriptions(): BelongsTo
    {
        return $this->belongsTo(config('model-variables.models.user_subscription_plans.class'), 'uuid', 'user_uuid');
    }
}