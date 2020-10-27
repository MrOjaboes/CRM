<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    protected $fillable = [
        'users',
        'package',
        'paid',
        'balance',
        'package_amount',
        'user_id',
        'school_id',         
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
