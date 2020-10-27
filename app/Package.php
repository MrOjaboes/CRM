<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name', 
        'amount',        
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
