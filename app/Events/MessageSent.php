<?php	
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Message ;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    protected $channel ;
    
    public $message;

     /**
     * Create a new event instance.
     *
     * @return void
     */
     public function __construct($message)
     {
        $this->message = $message;    
     }

    public function dontBroadcastToCurrentUser(){

    }

    /**
    * Get the channels the event should broadcast on.
    *
    * @return \Illuminate\Broadcasting\Channel|array
    */
    public function broadcastOn()
    {   
        /*we'll just use this for simpler coding..*/
    // private channels .. -> needs user authenticated..
        return new PrivateChannel('message.'.$this->message->id);
    // return new PrivateChannel('channel-name');
    }


    public function broadcastAs(){
        return "New Event";
    }

    /*Broadcast with*/
    public function broadcastWith()
    {
        return [  
            'message' => $this->message
        ];
    }
}
