<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'bill_type',
        'company_name',
        'po_no',
        'po_date',
        'brand_name',
        'product_name',
        'uom',
        'qty',
        'gst',
        'mrp',
        'wrate',
        'rrate',
        'orate',
        'product_total',
        'grand_total',
        'created_by',
    ];
}
