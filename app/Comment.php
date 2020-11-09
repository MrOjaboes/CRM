<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
         
        'subject',
        'user_id',
        'school_id',         
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
