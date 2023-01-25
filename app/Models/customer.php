<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'trade_name',
        'customer_address',
        'route_name',
        'customer_gst',
        'customer_mobile',
        'outstanding',
    ];
}
