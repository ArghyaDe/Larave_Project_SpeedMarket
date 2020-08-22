<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Notifications\AddToCart;
use App\Notifications\RemoveFromCart;
use App\Supply;
use App\User;

/**
 *
 */
trait Cartable
{
    public function addToOrRemoveCart(User $user, Supply $supply)
    {
        $cart['user_id'] = $user->id;
        $cart['supply_id'] = $supply->id;
        if ($user->cart->where('supply_id', $supply->id)->first() != null) {
            $user->cart->where('supply_id', $supply->id)->first()->delete();
            $user->notify(new RemoveFromCart($supply));
        } else {
            Cart::create($cart);
            $user->notify(new AddToCart(Cart::where('supply_id', $supply->id)->where('user_id', $user->id)->first()));
        }
        return back();
    }
}
