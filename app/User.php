<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'phone_no', 'address', 'is_seller', 'is_manufacturer', 'avatar'
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

    public function getAvatarAttribute($value)        //now we can call this function just by 'avatar'
    {
        return $value ? asset('storage/' . $value) : "/images/PersonIcon.jpg";          //$value ? asset('storage/' . $value) : asset('images/PersonIcon.jpg');
    }

    public function path($append = '')
    {
        $path = route('profile.show', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }


    public function supply()
    {
        return $this->hasMany(Supply::class);
    }

    public function seller()
    {
        return $this->hasMany(Seller::class);
    }

    public function manufacturer()
    {
        return $this->hasMany(Manufacturer::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
