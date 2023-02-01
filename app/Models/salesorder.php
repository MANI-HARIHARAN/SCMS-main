<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesorder extends Model
{
    use HasFactory;
    protected $table='salesorder';
    protected $fillable=[
        'data',
        'route',
        'customer_name',
        'bill_type',
        'brands',
        'products',
        'uom',
        'qty',
        'gst',
        'rate',
        'product_total',
        'grand_total',
        'cash_received',
        'balance',
        'total_outstanding',


    ];
}
