<?php

namespace App\Listeners;

use App\Events\DeliveryReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyCourierIfDeliveryReceived
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DeliveryReceived  $event
     * @return void
     */
    public function handle(DeliveryReceived $event)
    {
        //
    }
}
