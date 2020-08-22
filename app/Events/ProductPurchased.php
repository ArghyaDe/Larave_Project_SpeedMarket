<?php

namespace App\Events;

use App\Supply;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductPurchased
{
    use Dispatchable,  SerializesModels;

    public $supply;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Supply $supply)
    {
        $this->supply = $supply;
    }
}
