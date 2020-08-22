<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Supply;

/**
 *
 */
trait Payable
{
    public function pay(Supply $supply)
    {
        ProductPurchased::dispatch($supply);

        return back();
    }
}
