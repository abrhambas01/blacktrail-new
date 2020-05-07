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
use App\User ;
 
class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    protected $room ;
    public $user;  
    public $message; 
    
    /*
    *
    * Create a new event instance.
    *
    * @return void
     */
    public function __construct(User $user, $message){
        $this->message = $message;    
        $this->user = $user ; 
    }

    /*Broadcast with*/
    public function broadcastWith()
    { 
        return [  
            'message' => $this->message ,
            'user' => $this->user 
        ];
    } 
    
    /**
    * Get the channels the event should broadcast on.
    *
    * @return \Illuminate\Broadcasting\Channel|array
    */ 
    public function broadcastOn()
    {   
        return new PrivateChannel('user.'.$this->user->id);
        /*we'll just use this for simpler coding..*/
        // private channels .. -> needs user authenticated..
        // return new PrivateChannel('messages'.$this->message->id);
    } 
 
    public function broadcastAs(){
        return "MessageEvent";
    }  

   
/*     
public function dontBroadcastToCurrentUser(){

    }
*/

}
