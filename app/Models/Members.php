<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'wallet_address',
        'password',
        'referral_code',
        'referrer1',
        'referrer2',
        'referrer3',
        'plan'
       
        // Add any other fields you want to make fillable
    ];
}
