<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDeals extends Model
{
    protected $fillable = [
         
        'completed',         
        'user_id',
        'school_id',
        'athr_id',         
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
