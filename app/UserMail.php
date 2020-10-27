<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMail extends Model
{
    protected $fillable = [
        'user_email',
        'user_id',
        'content', 
        'send_by',      
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
