<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolNote extends Model
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
