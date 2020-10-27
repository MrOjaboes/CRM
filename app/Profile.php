<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'address',
        'phone',
        'bank',
        'avatar',
        'gender',
        'account_number',
        'account_name',
        'account_type',
        'employment_status',
        'marital_status',
        'next_of_kin',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
