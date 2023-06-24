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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('name');
            $table->string('plan_id')->nullable();
            $table->float('price');
            $table->bigInteger('limit');
            $table->tinyInteger('type')->comment('1: Monthly, 2: Quartly, 3: 6 Months, 4: Yearly');
            $table->json('description')->nullable();
            $table->tinyInteger('status')->comment('0: In-active, 1: Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};
