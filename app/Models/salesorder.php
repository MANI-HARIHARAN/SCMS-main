<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesorder extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'route',
        'company_name',
        'bill_type',
        'brand_name',
        'product_name',
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
