<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        if ($order->wasChanged('status')) {
           \App\Events\OrderUpdated::dispatch($order);
        }
    }

}
