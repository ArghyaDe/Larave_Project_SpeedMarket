<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['user_id', 'company_name', 'company_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
