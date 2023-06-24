<?php

namespace App\Models\UserSubscriptionPlan;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserSubscriptionPlan\Traits\Relationships\UserSubscriptionPlanRelationship;

class UserSubscriptionPlan extends Model
{
    use UserSubscriptionPlanRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_uuid',
        'plan_uuid',
        'limit',
        'usage'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
