<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['supply_id', 'user_id', 'rating', 'review'];

    private function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviewer()
    {
        return $this->user();
    }
}
