<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'contact_person',
        'phone',
        'added_by', 
        'completed', 
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function deals()
    {
        return $this->hasOne(Deals::class);
    }

    public function school_notes()
    {
        return $this->hasMany(SchoolNote::class);
    }
}
