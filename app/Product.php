<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'photo', 'specification'];

    public function supply()
    {
        return $this->hasMany(Supply::class);
    }

    public function seller()
    {
        return $this->supply->map(function ($sup) {
            return $sup->seller();
        });
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function getPhotoAttribute($value)
    {
        return $value ? asset('storage/' . $value) : '/images/default_product_photo.jpg';
    }

    public function bestSupply()
    {
        if ((bool)$this->supply->first()) {
            return $this->supply->where('price', $this->supply->min('price'))->first();
        } else {
            return null;
        }
    }
}
