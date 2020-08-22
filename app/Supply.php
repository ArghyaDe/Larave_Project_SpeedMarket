<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = ['user_id', 'product_id', 'seller_id', 'price', 'rating'];
    private function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->user();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
