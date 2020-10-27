<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = ['bank_name', 'account_number', 'amount', 'reference', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
