<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'status',
        'user_id',
        'plan',
       
       
        // Add any other fields you want to make fillable
    ];
}
