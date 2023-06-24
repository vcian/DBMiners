<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('user_uuid');
            $table->string('plan_uuid');
            $table->bigInteger('limit');
            $table->bigInteger('usage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscription_plans');
    }
};
