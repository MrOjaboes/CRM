<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['amount', 'reason', 'user_id', 'due_date',  'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
