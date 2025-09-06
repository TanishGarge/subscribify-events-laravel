<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'venue',
        'city',
        'starts_at',
        'ends_at',
        'capacity',
        'public_price_cents',
        'member_discount_percent',
        'public_sales_start',
        'sales_end',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'public_sales_start' => 'datetime',
        'sales_end' => 'datetime',
        'public_price_cents' => 'integer',
        'member_discount_percent' => 'decimal:2',
        'capacity' => 'integer',
    ];
}
