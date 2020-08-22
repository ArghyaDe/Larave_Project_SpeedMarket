<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'supply_id'];
    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }
}
