<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User ; 

class DeliveryReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $delivery ; 

    public $courier ;  

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $courier, $delivery)
    {
        $this->delivery = $delivery ; 
        $this->courier  = $courier ; 
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user.'.$this->user->id);
    }

    public function broadcastWith()
    {
        return [  
             'key' => 'value'
        ]
    } 

    public function broadcastAs()
    {
        return [ 
             'key' => 'value'
        ]
    }

}
