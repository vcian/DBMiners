<?php

/**
 * Model-variables file contain all constant variables declaration of models which will be globally accessible.
 * Key of the table should be based on the table name (singular/plural)
 * Key of the Model class should be based on the class name (Always singular)
 */

use App\Models\User\User;
use App\Models\SubscriptionPlan\SubscriptionPlan;
use App\Models\UserSubscriptionPlan\UserSubscriptionPlan;

return [
    'models' => [
        /*
        * User Table and Model
        */
        'user' => [
            'table' => 'users',
            'class' => User::class,
        ],
        /*
        * Subscription Plans Table and Model
        */
        'subscription_plans' => [
            'table' => 'subscription_plans',
            'class' => SubscriptionPlan::class,
        ],
        /*
        * User Subscription Plans Table and Model
        */
        'user_subscription_plans' => [
            'table' => 'user_subscription_plans',
            'class' => UserSubscriptionPlan::class,
        ],
    ],
];