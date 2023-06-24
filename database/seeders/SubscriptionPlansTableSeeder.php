<?php

namespace Database\Seeders;

use App\Constant\Constant;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Exception;

class SubscriptionPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Schema::disableForeignKeyConstraints();

            $plans = [
                'uuid' => Str::uuid(),
                'name' => 'Free',
                'plan_id' => Constant::NULL,
                'price' => Constant::STATUS_ZERO,
                'limit' => Constant::STATUS_TEN,
                'type' => Constant::STATUS_ONE,
                'description' => 'Monthly trial plan',
                'status' => Constant::STATUS_ONE,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
            config('model-variables.models.subscription_plans.class')::create($plans);

            Schema::enableForeignKeyConstraints();
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }
    }
}
