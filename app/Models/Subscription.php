<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'status',
        'started_at',
        'cancelled_at'
    ];

protected $casts = [
        'started_at' => 'datetime',
        'cancelled_at' => 'datetime'
    ];

    /* Relationsihp Methods */

    public function plan() : BelongsTo {
        return $this->belongsTo(Plan::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
