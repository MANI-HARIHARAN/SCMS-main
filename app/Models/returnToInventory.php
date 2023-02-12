<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class returnToInventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'customer_name',
        'brand_name',
        'product_name',
        'stock_type',
        'qty',
        'gst',
        'mrp',
        'grand_total',
        'created_by',
    ];
}
