<?php

namespace App\Http\Controllers;

use App\Review;
use App\Supply;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Supply $supply)
    {
        $attribute = request()->validate([
            'review' => ['required', 'max:255'],
            'rating' => ['numeric', 'required', 'max:5']
        ]);
        Review::create([
            'supply_id' => $supply->id,
            'user_id' => current_user()->id,
            'rating' => $attribute['rating'],
            'review' => $attribute['review']
        ]);

        $supply->update(['rating' => $supply->review->map(function ($review) {
            return $review->rating;
        })->avg()]);

        return back();
    }

    public function update(Supply $supply)
    {
        $attribute = request()->validate([
            'review' => ['required', 'max:255'],
            'rating' => ['numeric', 'required', 'max:5']
        ]);

        $supply->review->where('user_id', current_user()->id)->first()->update([
            'rating' => $attribute['rating'],
            'review' => $attribute['review']
        ]);

        $supply->update(['rating' => $supply->review->map(function ($review) {
            return $review->rating;
        })->avg()]);

        return back();
    }
}
