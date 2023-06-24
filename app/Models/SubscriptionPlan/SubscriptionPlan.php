<?php

namespace App\Models\SubscriptionPlan;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'plan_id',
        'price',
        'limit',
        'type',
        'description',
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'description' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = Str::uuid();
        });
    }
}
