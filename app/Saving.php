<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = ['user_id', 'amount', 'initial_amount', 'final_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
