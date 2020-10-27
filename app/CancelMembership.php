<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancelMembership extends Model
{
    protected $fillable = ['user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
