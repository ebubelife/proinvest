<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'user_id',
        'hash',
        'asset',
        'wallet_address',
        'status',
        'type',
       
       
        // Add any other fields you want to make fillable
    ];
}
