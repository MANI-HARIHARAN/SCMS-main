<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class route extends Model
{
    use HasFactory;
    protected $table = 'routes';
    protected $fillable = [
        'route_name',
    ];
}
