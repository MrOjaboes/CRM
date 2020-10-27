<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'username', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function deals()
    {
        return $this->hasMany(Deals::class);
    }

    public function school_notes()
    {
        return $this->hasMany(SchoolNote::class);
    }
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
    public function schools()
    {
        return $this->hasMany(School::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function mails()
    {
        return $this->hasMany(UserMail::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function savings()
    {
        return $this->hasMany(Saving::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function offlinefunds()
    {
        return $this->hasMany(OfflineFund::class);
    }

    public function cancelmembership()
    {
        return $this->hasOne(CancelMembership::class);
    }
}
