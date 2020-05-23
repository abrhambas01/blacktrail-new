<?php

namespace App\Broadcasting;
use App\User;
use App\Message ; 

class UserChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct(User $user){
        return $message->id === $messageClient->id;
    }
 
    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\User  $user 
     * @return array|bool
     */
    public function join(User $user, User $userClient){
        return $user->id === $userClient->id ; 
    }    
    
}
    