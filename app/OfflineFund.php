<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfflineFund extends Model
{
    protected $fillable = ['amount', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);   
    }
}
