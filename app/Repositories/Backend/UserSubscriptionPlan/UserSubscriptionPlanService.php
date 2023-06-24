<?php

namespace App\Repositories\Backend\UserSubscriptionPlan;

use Exception;
use App\Constant\Constant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\Backend\BaseService;

class UserSubscriptionPlanService extends BaseService
{
    /**
     * @var string
     */
    public function __construct()
    {
        $this->model = config('model-variables.models.user_subscription_plans.class');
    }

    /**
     * Stores default plan for registered users
     * 
     * @param $uuid
     * @return object
     */
    public function storeDefaultPlan(string $uuid): object
    {
        $freePlan = Constant::EMPTY_STRING;
        
        try {
            $freePlan = config('model-variables.models.subscription_plans.class')::where('name', Constant::FREE_PLAN)->value('uuid');
            
            return $this->model::create([
                'user_uuid' => $uuid,
                'plan_uuid' => $freePlan,
                'limit' => Constant::STATUS_TEN,
                'usage' => Constant::STATUS_ZERO
            ]);

        } catch (Exception $ex) {
            Log::info($ex);
            DB::rollback();
        }
    }
}
