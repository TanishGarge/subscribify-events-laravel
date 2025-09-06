<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'name',
        'price_cents',
        'member_discount_percent',
        'early_access_hours',
        'is_active'
    ];

    protected $casts = [
        'price_cents' => 'integer',
        'member_discount_percent' => 'decimal:2',
        'early_access_hours' => 'integer',
        'is_active' => 'boolean'
    ];

    /* Relationship Method */
    public function subscriptions() : HasMany {
        return $this->hasMany(Subscription::class);
    }
}
