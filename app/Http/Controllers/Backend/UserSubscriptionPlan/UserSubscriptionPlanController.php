<?php

namespace App\Repositories\Backend\UserSubscriptionPlan;

use App\Http\Controllers\Controller;

class UserSubscriptionPlanController extends Controller
{
    /**
     * UserSubscriptionPlanController constructor.
     * @param UserSubscriptionPlanService $userSubscriptionPlanService
     */
    public function __construct(protected UserSubscriptionPlanService $userSubscriptionPlanService)
    {
        
    }

}
